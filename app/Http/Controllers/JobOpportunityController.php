<?php

namespace App\Http\Controllers;

use App\Models\JobOpportunity;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;

class JobOpportunityController extends Controller
{
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
        $user=auth()->user();
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

        //logged as user
        if($user->logged_as_company==false)
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
            $appliedJob=$user->savedJobs()->find($id);
            if(!is_null($appliedJob))//the user already applied 
            {
                $showApplyButton=false; //show withdraw button instead
                $showWithDrawApplicationButton=true;
                // the application is approved 
                if($appliedJob->pivot->approved==true)
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
