<?php

namespace App\Http\Controllers;

use App\Models\PositionType;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\Report;
use App\Models\School;
use App\Models\Industry;
use App\Models\JobOpportunity;
use App\Models\Message;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

//TODO check if logged as company or as user <and redirect back where not allowed>.
class UserServices extends Controller
{
    public function switchToCompanyAccount(){
        //TODO check in view if managing company is null then show this button or not
        if(auth()->user()->logged_as_company==true)
        return redirect()->back();
        if(!is_null(auth()->user()->managing_company_id))//user has created a company
            {
                $user=auth()->user();
                $user->logged_as_company=true;
                $user->save();
                return redirect('/company_home');
            }
        else//user have not created a company
        {//TODO process message in view
            redirect()->back()->with('warning','you don\'t have a company account yet!');
        }
    }
    public function explore(Request $request){

        //if logged as company redirect to back
        if(Auth :: check())
        {
            if (auth()->user()->logged_as_company==true)
            return redirect()->back();
        }
        $recomendedCompanies = Company :: simplePaginate(5);
        $recomendedPeople = User :: simplePaginate(5);

        if(Auth :: check())//case logged in: recommend companies and people of the same field
        {
            //the industry in the profile is set
            if(!is_null(auth()->user()->industry) )
            {
               $recomendedCompanies = Company :: where('industry_id' , auth()->user()->industry_id)->get();
               $recomendedPeople = User::where('industry_id',auth()->user()->industry_id )->get();
            }
            if(!is_null(auth()->user()->school_id))
            {
                //add people of the same school to recomended people collection
                $additionalRecomendedPeople= User :: where('school_id' ,auth()->user()->school_id)->get();
                $recomendedPeople->push($additionalRecomendedPeople);
                $recomendedPeople = $recomendedPeople->flatten();
            }
        }
        else//case not logged in, recommend people and companies of the selected industry ,school
        {
            //dd($request);
            if(!is_null($request->companyIndustry))
            {
                $recomendedCompanies = Company :: where('industry_id' , $request->companyIndustry) ->get();
            }
            if(!is_null($request->peopleIndustry )){

                $recomendedPeople = User::where('industry_id',$request->peopleIndustry)->get();
            }
            if(!is_null($request->peopleEducation)){
                $school= School :: where('name' ,$request->peopleEducation)->first() ;
                if($school !=null)
                {
                $additionalRecomendedPeople= User :: where('school_id' ,$school->id)->get();
                $recomendedPeople ->push($additionalRecomendedPeople);
                $recomendedPeople = $recomendedPeople->flatten();
                }
            }
        }
        $recomendedPeople=$recomendedPeople->shuffle();
        if(!is_null(auth()->user())) {
            $recomendedPeople = $recomendedPeople->reject(function ($value, $key) {
                return $value->id == auth()->user()->id;
            });
        }
        $recomendedCompanies=$recomendedCompanies->shuffle();
        $industries= Industry :: all();

        return view('explore',['recomendedCompanies'=> $recomendedCompanies ,
                                'recomendedPeople' => $recomendedPeople,
                                'industries' => $industries]);

    }
    public function showCreateJob(){
        $skills=\App\Models\Skill::all();
        $industries =Industry::all();
        $typeOfPosition=PositionType::all();
        return view ('create-job',['skills'=>$skills , 'typeOfPosition'=>$typeOfPosition,'industries'=>$industries]);
    }
    public function postJob(Request $request){

        $user=auth()->user();
        //if logged as a company redirect back
        if($user->logged_as_company==true)
        {
            return redirect()->back();
        }
        //validation

       $this->validate($request, [
            'title' => 'required|string',
            'remote'=>'nullable',
            'transport'=>'boolean',
            'city'=>'alpha|nullable',
            'country'=>'alpha|nullable',
            'role'=> 'required|string',
            'experience'=>'required|numeric',
            'salary'=>'required|numeric',
            'description'=>'required',
        ]);

        //make an new instance
        //job attributes
        $job = new JobOpportunity();
        $job->title=$request->input('title');
        $job->remote=$request->input('remote');
        $job->transportation=$request->input('transport');
        $job->city=$request->input('city');
        $job->country=$request->input('country');
        $job->role=$request->input('role');
        $job->required_experience=$request->input('experience');
        $job->salary=$request->input('salary');
        $job->description=$request->input('description');
        $job->publishable_id=$user->id;
        $job->publishable_type='App\Models\User';

        $job->save();

        //job relations
        $job->industry()->associate($request->input('industries'));
        $job->typeOfPosition()->associate($request->input('position'));
        $job->requiredSkills()->attach($request->input('skills'));
        $job->save();
        //TODO added save to the end
        return redirect('/published-jobs');
    }
    public function showJobSearch(){
        $skills=\App\Models\Skill::all();
        $industries =Industry::all();
        $typeOfPosition=PositionType::all();
        return view ('job-search',['skills'=>$skills , 'industries'=>$industries,'typeOfPosition'=>$typeOfPosition]);
    }
    public function showCreateCompany() {
        $industries=Industry::all();
        if (auth()->user()->logged_as_company==true)
            return redirect()->back();
        $is_managing_company =false;
        if(!is_null(auth()->user()->managing_company_id))
        {
            $is_managing_company = true;
            return view('/home',['is_managing_company'=> $is_managing_company])->with ('warning','you can only create one company');
        }
        return view('create-company',['is_managing_company'=> $is_managing_company,'industries'=>$industries]);

    }
    public function postCompany(Request $request){

        //validation
        $this->validate($request , [
            'name'=>'required',
            'email' => ['required','email',Rule::unique('companies')],
            'website_url'=>['URL',Rule::unique('companies')],
            'phone_number'=>['required','numeric',Rule::unique('companies')],
            'employees_count'=>'numeric|required',
            'city'=>'regex:/^[\pL\s\-]+$/u|required',
            'country'=>'regex:/^[\pL\s\-]+$/u|required',
            'admin1'=>'email|nullable|exists:users,email',
            'admin2'=>'email|nullable|exists:users,email',
            'admin3'=>'email|nullable|exists:users,email',
            'logo' => 'image|nullable|max:1999',
            'certificate' =>'nullable|max:1999',
        ]);
        //company's attributes
        $company= new Company();
        $company->name=$request->input('name');
        $company->email=$request->input('email');
        $company->website_url=$request->input('website_url');
        $company->phone_number=$request->input('phone_number');
        $company->employees_count=$request->input('employees_count');
        $company->city=$request->input('city');
        $company->country=$request->input('country');
        $company->slogan=$request->input('slogan');
        $company->about=$request->input('about');

        //TODO image processing
        if($request->hasFile('logo')){
            // Get filename with the extension
            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('logo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('logo')->storeAs('public/profiles', $fileNameToStore);
        }
        else {
                $fileNameToStore = 'companydefault.png';
        }

        $company->profile_thumbnail=$fileNameToStore;

        //certificate processing
        $certificateFileNameToStore=null;
        if($request->hasFile('certificate')){
            // Get filename with the extension
            $filenameWithExt = $request->file('certificate')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('certificate')->getClientOriginalExtension();
            // Filename to store
            $certificateFileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('certificate')->storeAs('public/certificates', $certificateFileNameToStore);
        }
        $company->certificate=$certificateFileNameToStore;

        //company's relations
        $company->industry()->associate($request->input('industry'));
        $adminEmails=collect([$request->input('admin1'),$request->input('admin2'),$request->input('admin3')]);

        $managing_users= User :: whereIn('email',$adminEmails)->get();
        $company->save();
        $company-> managingUsers()->saveMany($managing_users);
        $company->managingUsers()->save(auth()->user());



        $user=auth()->user();
        $user->logged_as_company=true;
        $user->save();

        return redirect('/company-home');
    }
    public function savedJobs(){
        if (auth()->user()->logged_as_company==true)
         return redirect()->back();
        $user = auth()->user();
        $savedJobs=$user->savedJobs;
        return view('saved_jobs',['user' => $user , 'savedJobs' => $savedJobs]);
    }
    public function publishedJobs(){
        if (auth()->user()->logged_as_company==true)
            return redirect()->back();
        $user = auth()->user()->load(['publishedJobs.requiredSkills','publishedJobs.industry']);
       //$publishedJobs=$user->publishedJobs;
      // $publishedJobs->load(['requiredSkills','industry']);
        //TODO see why not sorting wel
        $user->publishedJobs->sortByDesc('updated_at');
        return view('user_published_jobs',['user' => $user]);//,'publishedJobs' => $publishedJobs]);
    }
    public function appliedJobs(){
        if (auth()->user()->logged_as_company==true)
            return redirect()->back();
        $user = auth()->user();
        $appliedJobs=$user->appliedJobs;
        return view('applied_jobs',['user' => $user , 'appliedJobs' => $appliedJobs]);
    }
    public function notifications(){
        if (auth()->user()->logged_as_company==true)
            return redirect()->back();
        $user = auth()->user();
        $notifications=$user->notifications;
        return view('user-notifications',['user' => $user , 'notifications' => $notifications]);
    }
    public function messeging(){
        $user=auth()->user();
        if($user->logged_as_company==true)
            return redirect()->back();
        $messegingCompanies=$user->companyAcceptors;
        $messegingUsers=$user->userAcceptors;
        $messegingUsers->push($user->acceptants);
        $messegingUsers = $messegingUsers->flatten();

        return view('userMesseging',['user'=>$user, 'messegingCompanies'=>$messegingCompanies,
        'messegingUsers'=>$messegingUsers]);
    }
    public function companySearchResults(Request $request){
        if(Auth :: check())
        {
            if (auth()->user()->logged_as_company==true)
                return redirect()->back();
        }
        $searchResults = Company:: where ('name' , $request->input('companySearchName'))->get();
        return view('company_search_results', ['searchResults'=>$searchResults]);
    }
    public function peopleSearchResults(Request $request){
        if(Auth :: check())
        {
            if (auth()->user()->logged_as_company==true)
                return redirect()->back();
        }
        $searchResults = User:: where ('name' , $request->input('peopleSearchName'))->get();
        return view('people_search_results', ['searchResults'=> $searchResults]);
    }
    public function filterJobs(Request  $request){

        $user=auth()->user();
        $jobSearchResults=JobOpportunity:: where('expired',false)->get();

        //filter results to match the request
        //dd($request);
        /*$jobSearchResults=$jobSearchResults->when(!$request->isNotFilled('remote'),function($jobSearchResults){
            $jobSearchResults=$jobSearchResults->filter(function ($job ){
                return $job->remote == request('remote');
            });
        });*/

        if(!$request->isNotFilled('remote'))
        {
            $jobSearchResults=$jobSearchResults->filter(function ($job ){
                return $job->remote == request('remote');
            });
        }
        if(!$request->isNotFilled('city'))
        {
            $jobSearchResults=$jobSearchResults->filter(function ($job ){
                return $job->city == request('city');
            });
        }
        if(!$request->isNotFilled('country'))
        {
            $jobSearchResults=$jobSearchResults->filter(function ($job ){
                return $job->country == request('country');
            });
        }
        if(!$request->isNotFilled('industries'))
        {
            $jobSearchResults=$jobSearchResults->filter(function ($job ){
                //dd($job->industry);
                return $job->industry->id == request('industries');
            });
        }
        if(!$request->isNotFilled('typeOfPosition'))
        {
            $jobSearchResults=$jobSearchResults->filter(function ($job ){

                return $job->typeOfPosition->id == request('typeOfPosition');
            });
        }
        if(!$request->isNotFilled('required_experience'))
        {
            $jobSearchResults=$jobSearchResults->filter(function ($job ){
                return $job->required_experience == request('required_experience');
            });
        }
        if(!$request->isNotFilled('salary'))
        {
            $jobSearchResults=$jobSearchResults->filter(function ($job ){
                return $job->salary == request('salary');
            });
        }
        if(!$request->isNotFilled('transport'))
        {
            $jobSearchResults=$jobSearchResults->filter(function ($job ){
                return $job->transportation == request('transport');
            });
        }

        if(!is_null($request->input('skills') )) {//TODO sort by request's specification
            //TODO explain the changes
            $jobSearchResults = $jobSearchResults->sortBy([
                function ($job){
                    return count( collect( request('skills') )->diff( $job->requiredSkills ->modelKeys() )  );
                },
                function ($job) {
                return count( collect( $job->requiredSkills ->modelKeys() )->diff( request('skills')));
            }
                ]);
        }
        $jobSearchResults->load(['industry','typeOfPosition','requiredSkills','publishable']);
        //dd($jobSearchResults);
        //TODO reject all jobs published by user

        return view('job_search_results',['user'=>$user,'jobSearchResults'=>$jobSearchResults]);
    }
    //user-company functionalities
    public function getNotified($id){
        $user= auth()->user();
        //$company= Company :: find($id);
        $user->notifyingCompanies()->attach($id);
        return redirect('/companies/'.$id);
    }
    public function stopNotification($id){
        $user= auth()->user();
       // $company= Company :: find($id);
        $user->notifyingCompanies()->detach($id);
        return redirect('/companies/'.$id);
    }
    public function reportCompany($id){
       if(auth()->user()->logged_as_company==true)
       {
           return redirect()->back();
       }
        return view('report',['id'=>$id]);
    }
    public function sendCompanyReport(Request $request,$id){
        $report = new Report();
        $report->reason=$request->input('reportReason');
        $report->information=$request->input('reportInformation');
        //auth()->user()->outcomingReports()->save($report);
        // $company=Company :: find($id);
        //$company->incomingReports()->save($report);
        $report->sendable_id=auth()->user()->id;
        $report->sendable_type='App\Models\User';//TODO attaching or saving
        $report->recievable_id=$id;
        $report->recievable_type='App\Models\Company';//TODO attaching or saving
        $report->save();

        return redirect('/companies/{id}' ,['id'=>$id]);

    }
    public function showMessagesWithCompany($id){
        if(auth()->user()->logged_as_company==true)
        {
            return redirect()->back();
        }
        $messages=collect();
        $user=auth()->user();
        $messages=$user->sentMessages()->find($id);//TODO check receivable and sendable type
        $messages->push($user->recievedMessages()->find($id));
        $messages=$messages->flatten();
        $messages=$messages->sortBy('created_at');
        return view('conversation', ['messages'=>$messages,'user'=>$user]);
    }
    public function sendMessageToCompany(Request $request,$id){
        $message= new Message();
        $message->body=$request->input('messageBody');
        $message->sendable_id=auth()->user()->id;
        $message->recievable_id=$id;
        $message->sendable_type='App\Models\User';
        $message->recivable_type='App\Models\Company';
        $message->save();
        //send a notification of a new message to a company
        $notification = new Notification();
        $notification->body='You received a new message of this user: '.auth()->user()->name;
        $notification->recievable_id=$id;
        $notification->recievable_type='App\Models\Company';
        $notification->causable_id=auth()->user()->id;
        $notification->causable_type='App\Models\User';
        $notification->notification_url='/users';
        $notification->save();

        return redirect('/companies/{id}/messages',['id'=>$id]);
    }
    //user-job functionalities
    public function applyJob($id){
        $job= JobOpportunity :: find($id);
        //attach user to this job
        $user=auth()->user();
        $user->appliedJobs()->attach($id);
        //send a notification to the job publisher
        $notification = new Notification();
        $notification->body= 'The user ' . $user->name .' has applied to a job you published ,with the title'  .$job->title . 'of the ID '.$job->id;
        $notification->causable_id=$user->id;
        $notification->causable_type='App\Models\User';
        $notification->notifiable_id=$job->publishable_id;
        if($job->publishable_type=='App\Models\User')//case the publisher is a user
        {
            $notification->notifiable_type='App\Models\User';
        }
        else {
            $notification->notifiable_type='App\Models\Company';
        }
        $notification->notification_url='/users/'.$user->id;
        $notification->save();
        return redirect ('/jobs/'.$id);
    }
    public function withdrawApplication($id){
        $user=auth()->user();
        $user->appliedJobs()->detach($id);
        $job=JobOpportunity :: find($id);
        //TODO delete related  notification
        $notification=Notification::where ('causable_id',$user->id)
                                    ->where('causable_type','App\Models\User')
                                    ->where('notifiable_id',$job->publishable_id)
                                    ->where('notifiable_type',$job->publishable_type)
                                    ->delete();
        $previousPath =str_replace(url('/'), '', url()->previous());
        if ( $previousPath == '/jobs/'.$id)//TODO mention changes
            return redirect('/jobs/'.$id);
        else
            return redirect('/applied-jobs');

    }
    public function saveJob($id){
        //TODO check if logged as company
        $user=auth()->user();
        $user->savedJobs()->attach($id);
        return redirect('/jobs/'.$id);//,['id',$id]);
    }
    public function unsaveJob($id){
        $user=auth()->user();
        $user->savedJobs()->detach($id);
        $previousPath =str_replace(url('/'), '', url()->previous());
        if ($previousPath == '/jobs/'.$id )//TODO mention changes
            return redirect('/jobs/'.$id);
        else
            return redirect('/saved-jobs');

    }
    public function addColleague ($id){
        $loggedUser=auth()->user();
        $loggedUser->sentColleagues()->attach($id);
        //notification
        $notification = new Notification();
        $notification->body="the user ".$loggedUser->name . ' has added you as a colleague';
        $notification->causable_id=$loggedUser->id;
        $notification->causable_type='App\Models\User';
        //$notification->type='new colleague';
        $notification->notifiable_id=$id;
        $notification->notifiable_type='App\Models\User';
        $notification->notification_url='/users/'.$loggedUser->id;
        $notification->save();

        return redirect('/users/'.$id);
    }
    public function cancelRequest($id){
        $loggedUser=auth()->user();
        $loggedUser->sentColleagues()->detach($id);
        Notification::where ('causable_id',$loggedUser->id)
            ->where('causable_type','App\Models\User')
            ->where('notifiable_id',$id)
            ->where('notifiable_type','App\Models\User')
            ->delete();
        return redirect('/users/'.$id);
    }
    public function approveColleague($id){
        $loggedUser=auth()->user();
        $loggedUser->receivedColleagues()->updateExistingPivot($id,['approved'=>1]);
        //TODO maybe make a new notification
        return redirect('/users/'.$id);
    }
    public function ignoreColleagueRequest($id){
        $loggedUser=auth()->user();
        $loggedUser->receivedColleagues()->detach($id);
        return redirect('/users/'.$id);
    }
    public function showMessagesWithUser($id){
        $messages=[];
        $user=auth()->user();
        if(auth()->user()->logged_as_company==false)//case logged in as user
        {
            $messages=$user->sentMessages()->where('receivable_type','App\Models\User')
                                            ->where('receivable_id',$id)->get();//TODO delete the ()
            $messages->push($user->receivedMessages()->where('sendable_type','App\Models\User')
                                                     ->where('sendable_id',$id)->get() );//TODO delete the ()
        }
        else //case logged in as company
        {
            $messages=$user->sentMessages()->where('receivable_type','App\Models\Company')
                                            ->where('receivable_id',$id)->get();//TODO delete the ()
            $messages->push($user->recievedMessages()->where('sendable_type','App\Models\Company')
                                                     ->where('sendable_id',$id)->get());//TODO delete the ()
        }
        $messages=$messages->flatten();
        $messages=$messages->sortBy('created_at');
        if(auth()->user()->logged_as_company)
            return view('companyusermessages', ['messages'=>$messages,'user'=>$user]);
        return view('userusermessages', ['messages'=>$messages,'user'=>$user]);
    }
    public function sendMessageToUser(Request $request,$id){
        $message= new Message();
        $message->body=$request->input('messageBody');
        if(auth()->user()->logged_as_company==false)//logged as user
        {
            $message->sendable_id=auth()->user()->id;
            $message->sendable_type='App\Models\User';
            //send a notification of a new message to the receiving user
            $notification = new Notification();
            $notification->body='You received a new message of this user: '.auth()->user()->name;
            $notification->recievable_id=$id;
            $notification->recievable_type='App\Models\User';
            $notification->causable_id=auth()->user()->id;
            $notification->causable_type='App\Models\User';
            $notification->notification_url='/users';
            $notification->save();

        }
        else//logged as company
         {
            $message->sendable_id=auth()->user()->managing_company_id;
            $message->sendable_type='App\Models\Company';
            $company=auth()->user()->managingCompany;
            //send a notification of a new message to the receiving user
            $notification = new Notification();
            $notification->body='You received a new message of this company: '.$company->name;
            $notification->recievable_id=$id;
            $notification->recievable_type='App\Models\User';
            $notification->causable_id=$company->id;
            $notification->causable_type='App\Models\Company';
            $notification->notification_url='/companies';
            $notification->save();
        }
        $message->recievable_id=$id;
        $message->recivable_type='App\Models\User';
        $message->save();
        return redirect('/users/{id}/messages',['id'=>$id]);

    }
    public function reportUser($id){
         return view('report',['id'=>$id]);
    }
    public function sendUserReport(Request $request,$id){
        $report = new Report();
        $report->reason=$request->input('reportReason');
        $report->information=$request->input('reportInformation');
        if(auth()->user()->logged_as_company==false)
        {
            $report->sendable_id=auth()->user()->id;
            $report->sendable_type='App\Models\User';
        }
        else {
            $report->sendable_id=auth()->user()->managing_company_id;
            $report->sendable_type='App\Models\Company';
        }
        $report->recievable_id=$id;
        $report->recievable_type='App\Models\Company';//TODO attaching or saving
        $report->save();

        return redirect('/users/{id}',['id'=>$id]);

    }
    //website admin functionalities
    public function manageReports(){
        $user=auth()->user();
        if($user->logged_as_company==true)
        {
            return redirect()->back();
        }
        if($user->admin==false)
        {
            return redirect()->back();
        }
        $companiesReports=Report :: where('receivable_type','App\Models\Company')->get();
        $usersReports=Report ::where('receivable_type','App\Models\User')->get();
        $companiesReports=$companiesReports->groupBy('receivable_id');
        $usersReports=$usersReports->groupBy('receivable_id');
        $companiesReports=$companiesReports->sortByDesc(function($companyReports){
            return count($companyReports);
        });
        $usersReports=$usersReports->sortByDesc(function($userReports){
            return count($userReports);
        });
        $companiesIDs= $companiesReports->keys();
        $usersIDs=$usersReports->keys();
        $reportedCompanies=Company::find($companiesIDs);
        $reportedUsers=User::find($usersIDs);

        return view ('manageReports',['user'=>$user,'companiesReports'=>$companiesReports,'companiesIds'=>$companiesIDs,
            'usersReports'=>$usersReports,'usersIds'=>$usersIDs,
            'reportedCompanies'=>$reportedCompanies,'reportedUsers'=>$reportedUsers]);
    }
    public function showCompanyReports($id){
        $user=auth()->user();
        if($user->logged_as_company==true)
        {
            return redirect()->back();
        }
        if($user->admin==false)
        {
            return redirect()->back();
        }
        $reportedCompany=Company :: find($id);
        $reports=$reportedCompany->incomingReports;

        return view('show_company_reports',['user'=>$user,'reportedCompany'=>$reportedCompany,'reports'=>$reports]);
    }
    public function showUserReports($id){
        $user=auth()->user();
        if($user->logged_as_company==true)
        {
            return redirect()->back();
        }
        if($user->admin==false)
        {
            return redirect()->back();
        }
        $reportedUser=User :: find($id);
        $reports=$reportedUser->incomingReports;

        return view('show_company_reports',['user'=>$user,'reportedUser'=>$reportedUser,'reports'=>$reports]);
    }



























}


