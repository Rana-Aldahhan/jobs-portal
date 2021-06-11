<?php

namespace App\Http\Controllers;

use App\Models\JobOpportunity;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;

class JobOpportunityController extends Controller
{
    public function showApplicants($id){
        $user=auth()->user();
        $job=JobOpportunity :: find($id);
        $applicants=$job->applicants;
        return view('applicants', ['user'=> $user , 'job'=>$job, 'applicants'=>$applicants]);
    }
    public function approveApplicant($jobID, $userID){
        $approvingUser=auth()->user();
        $approvedUser=User:: find($userID);
        $job=JobOpportunity :: find($jobID);
        if($approvingUser->logged_as_company==false)//case a user is accepting another user 
        {
            $approvedUser->appliedJobs()->updateExistingPivot($jobID,['approved'=>true]);
            //add a new acceptant-acceptor relation
            $approvedUser->userAcceptors()->attach($approvingUser);
            //notification
            $notification = new Notification();
            $notification->body= 'The user ' + $approvingUser->name + ' has approved your job application to the job with the title' + $job->title + 'of the ID '+ $job->id;
            $notification->causable_id=$approvingUser->id;
            $notification->causable_type='App\Models\User';
            $notification->recievable_id=$userID;
            $notification->recievable_type='App\Models\User';
            $notification->save();  
            return redirect('/profile/published-jobs');
        }
        else // case logged as company
        {
            $approvingCompany=Company :: find($approvingUser->managing_company_id);
            $approvedUser->appliedJobs()->updateExistingPivot($jobID,['approved'=>true]);
            //add a new acceptant-acceptor relation
            $approvedUser->companyAcceptors()->attach($approvingCompany->id);
             //notification
             $notification = new Notification();
             $notification->body= 'The company ' + $approvingCompany->name + ' has approved your job application to the job with the title' + $job->title + 'of the ID '+ $job->id;
             $notification->causable_id=$approvingCompany->id;
             $notification->causable_type='App\Models\Company';
             $notification->recievable_id=$userID;
             $notification->recievable_type='App\Models\User';
             $notification->save();  
             return redirect('/company/manage-jobs');
        }
        
    }
    public function ignoreApplicant($jobID,$userID){
        $ignoredUser=User::find($userID);
        $ignoredUser->appliedJobs()->detach($jobID);
        $user=auth()->user();
        if($user->logged_as_company==true)
            return redirect('/profile/published-jobs');
        else 
            return redirect('/company/manage-jobs');

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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=auth()->user();//can be null
        $showSaveButton=true;
        $showApplyButton=true;
        $showWithDrawApplicationButton=false;
        $show_edit_delete_applicants_buttons=false;
        $job=JobOpportunity :: find($id);
        $requiredSkills=$job->requiredSkills;
        $jobIndustry=$job->industry;
        $typeOfPosition=$job->typeOfPosition;
        $publisher=null;
        $publishableIndustry=null;

        if(Auth :: check())//case logged in
        {
        
        if($user->logged_as_company==false)//logged as user
        {  
            ////////////////views tests////////////////////////////
            if(!is_null($user->publishedJobs()->find($id)))
            {
                $showSaveButton=false;//and don't show unsave button
                $showApplyButton=false;
                $show_edit_delete_applicants_buttons=true;
            }
            if(!is_null($user->savedJobs()->find($id)))//the user already saved the job
            {
                $showSaveButton=false;//and show unsave button
            }
            $appliedJob=$user->appliedJobs()->find($id);
            if(!is_null($appliedJob))//the user already applied 
            {
                $showApplyButton=false; //show withdraw button instead
                $showWithDrawApplicationButton=true;
                // the application is approved 
                if($user->appliedJobs()->find($id)->pivot->approved==true)
                    $showWithDrawApplicationButton=false;        
            }
            //////////////bring recruiter information///////////////
            
            if($job->publishable_type=='App\Models\User')//recruiter is user
            {
             $publisher=User ::find($job->publishable_id);
             $publishableIndustry=$publisher->industry;   
            }
            else //recruiter is company
            {
             $publisher=Company ::find($job->publishable_id);
             $publishableIndustry=$publisher->industry; 
            }


        }
        //logged as company
        else {
            //hide all apply save buttons 
            $showApplyButton=false;
            $showSaveButton=false;
            //check if the company published the job
            $company=Company :: find($user->managing_company_id);
            if(!is_null($company->publishedJobs()->find($id)))
            $show_edit_delete_applicants_buttons=true;

        }
    

        return view('show_job' , ['user'=>$user , 'job'=>$job , 'publisher'=>$publisher,
        'requiredSkills'=>$requiredSkills,'jobIndustry'=>$jobIndustry,
        'typeOfPosition'=>$typeOfPosition,
        'publishableIndustry'=>$publishableIndustry,
        'showSaveButton'=>$showSaveButton, 'showApplyButton'=>$showApplyButton,
        'showWithDrawApplicationButton'=>$showWithDrawApplicationButton,
        'show_edit_delete_applicants_buttons'=>$show_edit_delete_applicants_buttons,
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job=JobOpportunity :: find($id);
        $requiredSkills=$job->requiredSkills;
        $typeOfPosition=$job->typeOfPosition;
        $industry=$job->industry;
        return view('editJob',['job'=> $job, 'requiredSkills'=> $requiredSkills,
        'typeOfPosition'=>$typeOfPosition, 'industry'=>$industry]);
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
        //validtion
        $this->validate ($request , [
            'title' => 'requied | alpha' ,
            'description' => 'requied',
            'remote' =>'boolean | required',
            'city' => 'alpha ' ,
            'country' => 'alpha ' ,
            'transportation' =>'boolean',
            'salary'=>'numeric | required',
            'required_experience' => 'numeric | required ',
            'role'=>'alpha | required'

        ]);
        $job=JobOpportunity :: find($id);
        $job->title=$request->input('title');
        $job->description=$request->input('description');
        $job->remote=$request->input('remote');
        $job->transportation=$request->input('transportation');
        $job->salary=$request->input('salary');
        $job->city=$request->input('city');
        $job->country=$request->input('country');
        $job->role=$request->input('role');
        $job->requiredExperience->$request->input('requiredExperience');
        //TODO  deatch old skills,industry,type of position && attach new ones
        $job->requiredSkills()->saveMany($request->input('requiredSkills'));//
        $job->typeOfPosition()->save($request->input('typeOfPosition'));
        $job->industry->save($request->input('industry'));
        $job->save();
        return redirect('jobs/{id}',['id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job=JobOpportunity :: find($id);
        $job->delete();
        if(auth()->user()->logged_as_company==false)
        {
            return redirect('/profile/published_jobs')
        }
        else {
            return redirect('/company/manage-jobs');
        }
    }
}
