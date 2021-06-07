<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
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
        
        $company = Company :: find($id);
        $compayJobs = $company->publishedJobs;
        $companyEmployees= $company->employees;

        //check if user is getting notified from this company or not
        $user= auth()->user();
        $notified=false;
        $notifyingCompanies=$user->notifyingCompanies;
        foreach($notifyingCompanies as $company)
        {
            if($company->id == $id)
            $notified=true;
        }
        //checking if user can message this company
        $canMessage=false;
        $userAppliedjobs=$user->appliedJobs;
        foreach($userAppliedjobs as $job)
        {
            if($job->publishable_type="App\Models\Company")
            {
                if($job->publishable_id==$id )
                {
                    if($job->pivot->approved==true)
                          $canMessage=true;
                }
                  
            }
        }
        return view('show_company', ['company' =>  $company ,
        'compayJobs'=> $compayJobs ,'companyEmployees' => $companyEmployees
        ,'notified' => $notified , 'canMessage' => $canMessage]);
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
