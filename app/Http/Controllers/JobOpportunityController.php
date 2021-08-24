<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use App\Models\JobOpportunity;
use App\Models\Notification;
use App\Models\PositionType;
use App\Models\Skill;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class JobOpportunityController extends Controller
{
    public function showApplicants($id){
        $user=auth()->user();
        $job=JobOpportunity :: find($id);
        $applicants=$job->applicants;
        $applicants=$applicants->sortByDesc(function ($user){
            return $user->pivot->created_at;
        })->paginate(3);
        if(!auth()->user()->logged_as_company) {
            if($job->publishable_id == $user->id && $job->publishable_type=='App\Models\User')
            return view('applicants', ['user' => $user, 'job' => $job, 'applicants' => $applicants]);
            else
                abort(403,'unauthorized access');
        }
        else{
            $company=$user->managingCompany;
            if($job->publishable_id == $company->id && $job->publishable_type=='App\Models\Company')
            return view('company-applicants', ['company'=> $company , 'job'=>$job, 'applicants'=>$applicants]);
            else
                abort(403,'unauthorized access');
        }
    }
    public function approveApplicant($jobID, $userID){
        $approvingUser=auth()->user();
        $approvedUser=User:: findOrFail($userID);
        $job=JobOpportunity::findOrFail($jobID);
        if($approvingUser->logged_as_company==false)//case a user is accepting another user
        {
            $approvedUser->appliedJobs()->updateExistingPivot($jobID, ['approved' => true]);
            //add a new acceptant-acceptor relation
            $approvedUser->userAcceptors()->attach($approvingUser);
            //notification
            $notification = new Notification();
            $notification->body = 'The user ' . $approvingUser->name . ' has approved your job application to the job with the title ' . $job->title . '/n published : ' . $job->created_at->diffForHumans();
            $notification->type = 'approved';
            $notification->causable_id = $approvingUser->id;
            $notification->causable_type = 'App\Models\User';
            $notification->notifiable_id = $userID;
            $notification->notifiable_type = 'App\Models\User';
            $notification->notification_url = '/jobs/' . $jobID;
            $notification->save();

            $job->expired = true;
            $job->save();

            if ($job->publishable_id == auth()->user()->id && $job->publishable_type == 'App\Models\User')
                return redirect('/published-jobs');
            else
                abort(403, 'unauthorized access');
        }
        else // case logged as company
        {
            $approvingCompany=Company :: find($approvingUser->managing_company_id);
            $approvedUser->appliedJobs()->updateExistingPivot($jobID,['approved'=>true]);
            //add a new acceptant-acceptor relation
            $approvedUser->companyAcceptors()->attach($approvingCompany->id);
             //notification
             $notification = new Notification();
            $notification->type='approved';
             $notification->body= 'The company ' .$approvingCompany->name . ' has approved your job application to the job with the title' . $job->title .  '/n published : ' . $job->created_at->diffForHumans();
             $notification->causable_id=$approvingCompany->id;
             $notification->causable_type='App\Models\Company';
             $notification->notifiable_id=$userID;
             $notification->notifiable_type='App\Models\User';
            $notification->type = 'approved';
            $notification->notification_url = '/jobs/' . $jobID;
             $notification->save();

           /* $job->expired=true;
            $job->save();
                */
            if($job->publishable_id == $approvingCompany->id && $job->publishable_type=='App\Models\Company')
                return redirect('/manage-company-jobs');
            else
                abort(403,'unauthorized access');
        }

    }
    public function ignoreApplicant($jobID,$userID){
        $ignoredUser=User::findOrFail($userID);
        $ignoredUser->appliedJobs()->detach($jobID);
        $user=auth()->user();
        if(!$user->logged_as_company)
            return redirect('/published-jobs');
        else
            return redirect('/company/manage-jobs');

    }
    public function expireJob($id){

        $job=JobOpportunity::findOrFail($id);
        $job->expired=true;
        $job->save();
        if(!auth()->user()->logged_as_company)//case logged as user
        {
            if ($job->publishable_id == auth()->user()->id && $job->publishable_type == 'App\Models\User')
                return redirect('/jobs/'.$id);
            else
                abort(403, 'unauthorized access');
        }
        else//logged as company
        {
            if ($job->publishable_id == auth()->user()->managing_company_id && $job->publishable_type == 'App\Models\Company')
                return redirect('/jobs/'.$id);
            else
                abort(403, 'unauthorized access');
        }

    }
    public function activateJob($id){
        $job=JobOpportunity::findOrFail($id);
        $job->expired=false;
        $job->save();
        if(!auth()->user()->logged_as_company)//case logged as user
        {
            if ($job->publishable_id == auth()->user()->id && $job->publishable_type == 'App\Models\User')
                return redirect('/jobs/'.$id);
            else
                abort(403, 'unauthorized access');
        }
        else//logged as company
        {
            if ($job->publishable_id == auth()->user()->managing_company_id && $job->publishable_type == 'App\Models\Company')
                return redirect('/jobs/'.$id);
            else
                abort(403, 'unauthorized access');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id

     */
    public function show($id)
    {
        $user=auth()->user();//can be null
        $showSaveButton=true;
        $showApplyButton=true;
        $showWithDrawApplicationButton=false;
        $show_edit_delete_applicants_buttons=false;
        $job=JobOpportunity::findOrFail($id);
        $requiredSkills=$job->requiredSkills;
        $jobIndustry=$job->industry;
        $typeOfPosition=$job->typeOfPosition;
        $publisher=null;
        $publishableIndustry=null;
        $reachCount=0;

        if(Auth :: check())//case logged in
        {

            if ($user->logged_as_company == false)//logged as user
            {
                ////////////////views tests////////////////////////////
                if (!is_null($user->publishedJobs()->find($id)))//case the logged user is the publisher of this job
                {
                    $showSaveButton = false;//and don't show unsave button
                    $showApplyButton = false;
                    $show_edit_delete_applicants_buttons = true;
                    //count the last month's reaches
                    //delete every reach created before a month
                    $job->userViewers()->detach($job->userViewers()->wherePivot('created_at','<',now()->subDays(30))->get());
                    //$expired_reaches=$job->userViewers()->where('created_at', '>',now()->subDays(30))->get();
                    //$expired_reaches->delete();
                    //count this month reaches with distinct viewers
                    $reachCount=DB :: table('user_job_views')->select('viewing_id')->where('viewer_id',$job->id)->distinct()->get()->count();

                }
                else//the logged user is not the publisher of the job
                {
                    // increment the job's reaches
                    $user->jobViewings()->attach($job);
                    //$job->userViewers()->save($user);
                }
                if (!is_null($user->savedJobs()->find($id)))//the user already saved the job
                {
                    $showSaveButton = false;//and show unsave button
                }
                $appliedJob = $user->appliedJobs()->find($id);
                if (!is_null($appliedJob))//the user already applied
                {
                    $showApplyButton = false; //show withdraw button instead
                    $showWithDrawApplicationButton = true;
                    // the application is approved
                    if ($user->appliedJobs()->find($id)->pivot->approved == true)
                        $showWithDrawApplicationButton = false;
                }
                //////////////bring recruiter information///////////////

                if ($job->publishable_type == 'App\Models\User')//recruiter is user
                {
                    $publisher = User::find($job->publishable_id);
                } else //recruiter is company
                {
                    $publisher = Company::find($job->publishable_id);
                }
                $publishableIndustry = $publisher->industry;

            } //logged as company
            else {
                //hide all apply save buttons
                $showApplyButton = false;
                $showSaveButton = false;
                //check if the company published the job
                $company = Company:: find($user->managing_company_id);
                if (!is_null($company->publishedJobs()->find($id))) //case the logged company is the job's publisher
                {
                    $show_edit_delete_applicants_buttons = true;
                    //count the last month's reaches
                    //delete every reach created before a month
                   /* $expired_reaches=$job->userViewers()->where('created_at', '>',now()->subDays(30))->get();
                    $expired_reaches->delete();
                   */
                    $job->userViewers()->detach($job->userViewers()->wherePivot('created_at','<',now()->subDays(30))->get());
                    //count this month reaches with distinct viewers
                    $reachCount=DB :: table('user_job_views')->select('viewing_id')->where('viewer_id',$job->id)->distinct()->get()->count();

                }

            }
        }

        if($job->expired)
            $showApplyButton=false;
        return view('show_job' , ['user'=>$user , 'job'=>$job , 'publisher'=>$publisher,
        'requiredSkills'=>$requiredSkills,'jobIndustry'=>$jobIndustry,
        'typeOfPosition'=>$typeOfPosition,
        'publishableIndustry'=>$publishableIndustry,
        'showSaveButton'=>$showSaveButton, 'showApplyButton'=>$showApplyButton,
        'showWithDrawApplicationButton'=>$showWithDrawApplicationButton,
        'show_edit_delete_applicants_buttons'=>$show_edit_delete_applicants_buttons,
        'reachCount'=>$reachCount
        ]);
    }


    public function edit($id)
    {
        $job=JobOpportunity::findOrFail($id);
        $requiredSkills=$job->requiredSkills;
        $typeOfPosition=$job->typeOfPosition;
        $industry=$job->industry;
        $industries=Industry::all();
        $skills=Skill::all();
        $typeOfPositions=PositionType::all();
        return view('editJob',['job'=> $job, 'requiredSkills'=> $requiredSkills,
            'typeOfPosition'=>$typeOfPosition, 'industry'=>$industry,'industries'=>$industries,'skills'=>$skills,'typeOfPositions'=>$typeOfPositions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validation
        $this->validate($request, [
            'title' =>'required|regex:/^[\pL\s\-]+$/u',
            'description' => 'required',
            'city' => 'regex:/^[\pL\s\-]+$/u|nullable ',
            'country' => 'regex:/^[\pL\s\-]+$/u|nullable ',
            'salary' => 'numeric|required',
            'experience' => 'numeric | required ',
            'role' => 'regex:/^[\pL\s\-]+$/u| required',
            'skills'=>'required',
        ]);

        $job=JobOpportunity::findOrFail($id);

        $job->title=request()->input('title');
        $job->description=$request->input('description');
        if($request->input('remote')!= null)
            $job->remote=$request->input('remote');
        else
            $job->remote=0;
        if($request->input('transport')!= null)
            $job->transportation=$request->input('transport');
        else
            $job->transportation=0;
        $job->salary=$request->input('salary');
        $job->city=$request->input('city');
        $job->country=$request->input('country');
        $job->role=$request->input('role');
        $job->required_experience=$request->input('experience');

        $job->requiredSkills()->detach($job->required_skills);
        $job->requiredSkills()->attach($request->input('skills'));
        $job->typeOfPosition()->dissociate();
        $job->typeOfPosition()->associate($request->input('position'));
        $job->industry()->dissociate();
        $job->industry()->associate($request->input('industry'));

        $job->save();
        return redirect('jobs/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $job=JobOpportunity::findOrFail($id);
        DB::table('applications')->where('job_id',$job->id)->delete();
        DB::table('job_skill')->where('job_id',$job->id)->delete();
        DB::table('saved_jobs')->where('job_id',$job->id)->delete();
        DB::table('user_job_views')->where('viewer_id',$job->id)->delete();
        DB ::table('notifications')->where('notification_url','/jobs/'.$id)->delete();
        $job->delete();

        if(auth()->user()->logged_as_company==false)
        {
            return redirect('/published-jobs');
        }
        else {
            return redirect('/manage-company-jobs');
        }
    }
}
