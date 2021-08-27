<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use App\Models\WorkPlace;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\Skill;
use App\Models\School;
use App\Models\Language;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;

class UserController extends Controller
{
    public function showProfile(){
        if (auth()->user()->logged_as_company==true)
            abort(403,'unauthorized access');
        $user= auth()->user();
        $school=$user->school;
        $skills=$user->skills;
        $industry=$user->industry;
        $languages=$user->languages;
        $workplaces=$user->workPlaces;
        $sentColleagues=$user->sentColleagues()->wherePivot('approved',1)->get();
        $receivedColleagues=$user->receivedColleagues()->wherePivot('approved',1)->get();
        $colleagues =$sentColleagues->push($receivedColleagues)->flatten();
        $usersReachCount=0;
        $companiesReachCount=0;
        //count users reaches to this profile of the last month

        //delete every reach created before a month

        $user->userViewers()->detach($user->userViewers()->wherePivot('created_at','<',now()->subDays(30))->get());


        //count this month reaches with distinct viewers
        $usersReachCount=DB :: table('user_user_views')->select('viewing_id')->where('viewer_id',$user->id)->distinct()->get()->count();

        //count company reaches to this profile of the last month

        //delete every reach created before a month
        //$expired_reaches=$user->companyViewers()->where('created_at', '<',now()->subDays(30))->get();
        $user->companyViewers()->detach($user->companyViewers()->wherePivot('created_at','<',now()->subDays(30))->get());


        //count this month reaches with distinct viewers
        $companiesReachCount=DB :: table('company_user_views')->select('viewing_id')->where('viewer_id',$user->id)->distinct()->get()->count();
        $colleagues=$colleagues->paginate(3);
        return view('user-profile', ['user' => $user,'school'=>$school,'skills'=> $skills,'industry'=>$industry,
        'languages'=>$languages,'workplaces'=>$workplaces,'sentColleagues'=>$sentColleagues,'receivedColleagues'=>$receivedColleagues,'usersReachCount'=>$usersReachCount,
        'colleagues'=>$colleagues,'companiesReachCount'=>$companiesReachCount]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User :: paginate(5);
        return view();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // return view()
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $loggedUser=auth()->user();//can be null
        if($loggedUser!= null && $id == $loggedUser->id && !$loggedUser->logged_as_company)
            return redirect('/profile');

        $user=User::findOrFail($id);
        $school=$user->school;
        $skills=$user->skills;
        $workPlaces=$user->workPlaces;
        $languages=$user->languages;
        $sentColleagues=$user->sentColleagues()->wherePivot('approved',1)->get();
        $receivedColleagues=$user->receivedColleagues()->wherePivot('approved',1)->get();
        $colleagues =$sentColleagues->push($receivedColleagues)->flatten()->paginate(3);
        $userPublishedJobs=$user->publishedJobs->sortBy('created_at')->paginate(3);
        $showAddColleagues=true;// cancel colleagues request
        $showCancelRequest=false;
        $showApproveRequest=false;//show remove request
        $showIgnoreRequest=false;
        $showMessage=false;

        if(Auth :: check())//case logged in
        {
            if($loggedUser->logged_as_company==false)//logged as user
            {
                //show colleagues states
                $sender=$loggedUser->sentColleagues()->find($id);
                $received=$loggedUser->receivedColleagues()->find($id);
                if(!is_null($sender) || !is_null($received))// case a user has sent a colleague request to another
                {
                    if(!is_null($sender))
                    {
                        $approved=$loggedUser->sentColleagues()->find($id)->pivot->approved;
                        $showAddColleagues=false;
                        if(!$approved)//case 1: logged user has sent a request and it is not accepted yet
                        {

                            $showCancelRequest=true;

                        }
                        else//case 2: logged user has sent a request and it is accepted
                        {
                            $showCancelRequest=false;
                        }
                        $showApproveRequest=false;
                        $showIgnoreRequest=false;

                    }
                    if(!is_null($received))
                    {
                        $approved=$loggedUser->receivedColleagues()->find($id)->pivot->approved;
                        $showAddColleagues=false;
                        $showCancelRequest=false;
                        if(!$approved)//case 1: logged user has received a request and it is not accepted yet
                        {
                            $showApproveRequest=true;
                            $showIgnoreRequest=true;

                        }
                        else//case 2: logged user has received a request and it is accepted
                        {
                            $showApproveRequest=false;
                            $showIgnoreRequest=false;
                        }
                    }
                }
                //show message in case a user has applied and has been approved to another user job
                $acceptor=$loggedUser->userAcceptors()->find($id);
                $acceptant=$loggedUser->userAcceptants()->find($id);
                if($acceptor!=null || $acceptant !=null)
                {
                    $showMessage=true;
                }
                // increment the showed user's reaches by users
                $user->userViewers()->attach($loggedUser);

            }
            else//logged as company
            {
                //show message in case a user has applied and has been approved to a company's job
                $company = Company::find($loggedUser->managing_company_id);
                $companyAcceptor=$user->companyAcceptors()->find($company->id);
                $showAddColleagues=false;
                if(!is_null($companyAcceptor))
                {
                    $showMessage=true;
                }
                // increment the showed user's reaches by companies
                $user->companyViewers()->attach($company);
            }
        }

        return view('show-user',['loggedUser'=>$loggedUser,'user'=>$user,'school'=>$school,'skills'=>$skills, 'workPlaces'=>$workPlaces,
        'languages'=>$languages, 'colleagues'=>$colleagues,'userPublishedJobs'=> $userPublishedJobs,
        'showAddColleagues'=>$showAddColleagues,'showCancelRequest'=>$showCancelRequest,'showApproveRequest'=>$showApproveRequest,'showIgnoreRequest'=>$showIgnoreRequest,
        'showMessage'=>$showMessage]) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit()//edit's form
    {
        $id= auth()->user()->id;
        $user= User::findOrFail( $id);
        $skills = Skill :: all();
        $languages = Language :: all();
        $industries=Industry::all();
        //fetch user skills and languages
        $user_skills= $user ->skills;
        $user_languages = $user->languages;
        $user_school=$user->school;
        $user_workplaces=$user->workPlaces;
        $user_industry=$user->industry;
        return view('profile-edit', ['user' => $user , 'skills' => $skills ,'languages' => $languages,'industries'=>$industries,
                                     'user_languages' => $user_languages , 'user_skills' =>$user_skills,
                                     'school'=>$user_school,'workplaces'=>$user_workplaces]);
    }


    public function update(Request $request)
    {
        //dd($request);
        $id= auth()->user()->id;
        $user= User::findOrFail( $id);

        //validation
        $this->validate($request,[
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => ['required','email',Rule::unique('users')->ignore($user->id) ],
            'birth-date' => 'date|nullable' ,
            'phone-number' => 'numeric|nullable' ,
            'city' => 'regex:/^[\pL\s\-]+$/u|nullable' ,
            'country' => 'regex:/^[\pL\s\-]+$/u|nullable' ,
            'school'=>'regex:/^[\pL\s\-]+$/u|nullable',
            'years-of-experience' => 'numeric|nullable',
            'current-job-title' => 'regex:/^[\pL\s\-]+$/u|nullable',
            'current-company-name' => 'regex:/^[\pL\s\-]+$/u|nullable',
            'profile' => 'image|nullable|max:1999',
            'resume'=>'nullable|max:1999'
        ]);


        if($request->hasFile('profile')){
            if($user->profile_thumbnail != 'userdefault.png')
                 unlink(storage_path('app/public/profiles/'.$user->profile_thumbnail));
            // Get filename with the extension
            $filenameWithExt = $request->file('profile')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('profile')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('profile')->storeAs('public/profiles', $fileNameToStore);
        } else {
            if($user->profile_thumbnail == 'userdefault.png')
                $fileNameToStore = 'userdefault.png';
            else
                $fileNameToStore=$user->profile_thumbnail;
        }

        $user->workPlaces()->detach($user->workPlaces);
        //workplace 1
        if(request()->input('previous-company-name1') != null)
        {
            $workPlace=WorkPlace::whereCompanyName(request()->input('previous-company-name1'))->get()->first();
            if($workPlace== null)//case the work place doesn't exist
            {   $workPlace= new WorkPlace();
                $workPlace->company_name=request()->input('previous-company-name1');
                $workPlace->save();
                $workPlace=WorkPlace::whereCompanyName(request()->input('previous-company-name1'))->get()->first();
            }
            $user->workPlaces()->attach($workPlace);
            $user->workPlaces()->updateExistingPivot($workPlace->id,
                ['started_at'=> request()->input('start-date1') ,'ended_at'=>request()->input('end-date1'),
                    'user_job_title'=> request()->input('previous_job_title1')]);
        }
        // workplace 2
        if(request()->input('previous-company-name2') != null)
        {
            $workPlace=WorkPlace::whereCompanyName(request()->input('previous-company-name2'))->get()->first();
            if($workPlace== null)//case the work place doesn't exist
            {   $workPlace= new WorkPlace();
                $workPlace->company_name=request()->input('previous-company-name2');
                $workPlace->save();
                $workPlace=WorkPlace::whereCompanyName(request()->input('previous-company-name2'))->get()->first();
            }
            $user->workPlaces()->attach($workPlace);
            $user->workPlaces()->updateExistingPivot($workPlace->id,
                ['started_at'=> request()->input('start-date2') ,'ended_at'=>request()->input('end-date2'),
                    'user_job_title'=> request()->input('previous_job_title2')]);
        }
        //workplace 3
        if(request()->input('previous-company-name3') != null)
        {
            $workPlace=WorkPlace::whereCompanyName(request()->input('previous-company-name3'))->get()->first();
            if($workPlace== null)//case the work place doesn't exist
            {   $workPlace= new WorkPlace();
                $workPlace->company_name=request()->input('previous-company-name3');
                $workPlace->save();
                $workPlace=WorkPlace::whereCompanyName(request()->input('previous-company-name3'))->get()->first();
            }
            $user->workPlaces()->attach($workPlace);
            $user->workPlaces()->updateExistingPivot($workPlace->id,
                ['started_at'=> request()->input('start-date3') ,'ended_at'=>request()->input('end-date3'),
                    'user_job_title'=> request()->input('previous_job_title3')]);
        }

        //resume processing
        if($request->hasFile('resume')){
            if($user->resume !=null)
                unlink(storage_path('app/public/resumes/'.$user->resume));
            $resumeFileNameToStore=null;
            // Get filename with the extension
            $filenameWithExt = $request->file('resume')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('resume')->getClientOriginalExtension();
            // Filename to store
            $resumeFileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('resume')->storeAs('public/resumes', $resumeFileNameToStore);
            $user->resume=$resumeFileNameToStore;
        }

        //edit
        $user->name= $request->input('name');
        $user->current_job_title=$request->input('current-job-title');
        //process current company
        $company=Company :: find(request()->input('current-company-name'));
        if(!is_null($company))
        {
            $user->current_company_id = $company->id;
        }
        $user->current_company_name=request()->input('current-company-name');
        $currentCompany=Company::where('name',request()->input('current-company-name'))->get()->first();
        if($currentCompany != null)
        {
            $user->currentCompany()->associate($currentCompany->id);
        }
        $user->current_job_title=request()->input('current-job-title');
        $user->city = request()->input('city');
        $user->country= request()->input('country');
        $user->looking_for_job=request()->input('looking-for-job');
        $user->about= request()->input('about');
        $user->birth_date=request()->input('birth_date');
        //search for a school with the same input name
        if(request()->input('school') !=null)
        {
        $school=School :: where('name' ,request()->input('school'))->get();
        //case there is a school of the same name
        if($school->count()!=0)
        {
            //no school is set before
            if($user->school == null)
                {
                    $user->school_id = $school[0]->id;
                }
            //school is set before
            else
            {    //set school is different from input
                if($user->school->name != $school[0]->name)
                {
                    $user->school_id = $school[0]->id;
                }

            }
        }
        //case there is no school with the same name
        else {
            $school = new school();
            $school->name= request()->input('school');
            $school->save();
            $school = School:: where('name',request()->input('school'))->get();//edit
            $user->school_id=$school[0]->id;
        }
        }
        $user->years_of_experience= request()->input('years-of-experience');
        $user->email=request()->input('email');
        $user->phone_number= request()->input('phone-number');
        $previousSkills=$user->skills;
        $user->skills()->detach($previousSkills);
        $user->skills()->attach(request()->input('skills'));
        $previousLanguages=$user->languages;
        $user->languages()->detach($previousLanguages);
        $user->languages()->attach(request()->input('languages'));
        $user->industry()->dissociate();
        $user->industry()->associate(request()->input('industry'));
        $user->profile_thumbnail=$fileNameToStore;
        //save
        $user->save();
        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id

     */
    public function destroy($id)
    {
        //case of website's admin deleting a user
        $user=User::findOrFail($id);
        DB::table('applications')->where('user_id',$id)->delete();
        DB::table('colleagues')->where('user1_id',$id)->orWhere('user2_id',$id)->delete();
        DB::table('company_user_acceptants')->where('acceptant_id',$id)->delete();
        DB::table('company_user_views')->where('viewer_id',$id)->delete();
        foreach ($user->publishedJobs as $job)
        {
            DB::table('applications')->where('job_id',$job->id)->delete();
            DB::table('job_skill')->where('job_id',$job->id)->delete();
            DB::table('saved_jobs')->where('job_id',$job->id)->delete();
            DB::table('user_job_views')->where('viewer_id',$job->id)->delete();
        }
        $user->publishedJobs()->delete();
        DB::table('language_user')->where('user_id',$id)->delete();
        DB::table('messages')->where([['sendable_id',$id],['sendable_type','App\Models\User']])
                    ->orWhere([['receivable_id',$id],['receivable_type','App\Model\User']])->delete();
        DB::table('notifications')->where([['causable_id',$id],['causable_type','App\Models\User']])
            ->orWhere([['notifiable_id',$id],['notifiable_type','App\Model\User']])->delete();
        DB::table('reports')->where([['sendable_id',$id],['sendable_type','App\Models\User']])
            ->orWhere([['receivable_id',$id],['receivable_type','App\Model\User']])->delete();
        DB::table('saved_jobs')->where('user_id',$id)->delete();
        DB::table('skill_user')->where('user_id',$id)->delete();
        DB::table('user_job_views')->where('viewing_id',$id)->delete();
        DB::table('user_notifying_company')->where('user_id',$id)->delete();
        DB::table('user_user_acceptants')->where('acceptor_id',$id)->orWhere('acceptant_id',$id)->delete();
        DB::table('user_user_views')->where('viewer_id',$id)->orWhere('viewing_id',$id)->delete();
        DB::table('user_workplace')->where('user_id',$id)->delete();
        $loggedUser = Auth::user();
        $userToLogout = User::find($id);
        Auth::setUser($userToLogout);
        Auth::logout();
        Auth::setUser($loggedUser);
        Auth::loginUsingId($loggedUser->id);
        $user->delete();
        return redirect('manage-reports');
    }
}
