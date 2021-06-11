<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function showProfile()
    {
        if (auth()->user()->logged_as_company==false)
            return redirect()->back();
        $company=auth()->user()->managingCompany;
        $industry=$company->industry;
        $employees=$company->employees;
        $publishedJobs=$company->publishedJobs;

        return view('company-profile',['company'=>$company,'industry'=>$industry,
        'employees'=>$employees, 'publishedJobs'=>$publishedJobs]);
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


    public function show($id)
    {
        $company = Company :: find($id);
        $companyJobs = $company->publishedJobs;
        $companyEmployees= $company->employees;

        $user=auth()->user();//can be null if not signed in

        $showNotifyButton=false;
        $showReportButton=false;
        $showMessageButton=false;

        //case logged in
        if(Auth :: check())
        {
            if($user->logged_as_company==false)// case  logged as user
            {
                $showReportButton=true;
                //check if user is getting notified from this company or not
                $notifyingCompany=$user->notifyingCompanies()->find($id);//find company in the notifying list
                if(is_null($notifyingCompany))//case the user doesn't get notified by this company
                {
                    $showNotifyButton=true;
                }
                //check if user is approved in any of company's job , so the user can message the company
                $approvedCompany=$user->companyAcceptors()->find($id);
                if(!is_null($notifyingCompany))//case the user can message the company
                {
                    $showMessageButton=true;
                }
            }
            // case logged as company: nothing should change from default values

        }
        else //case not logged in
        {
            $showNotifyButton=true;
            $showReportButton=true;
        }
        return view('show_company', ['company' =>  $company ,
        'companyJobs'=> $companyJobs ,'companyEmployees' => $companyEmployees,
        'user' => $user, 'showNotifyButton'=>$showNotifyButton,
        'showReportButton'=>$showReportButton,'showMessageButton'=>$showMessageButton]);
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
