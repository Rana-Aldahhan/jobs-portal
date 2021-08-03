<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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


    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


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
                if(!is_null($approvedCompany))//case the user can message the company
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


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //TODO detache every thing and delete every thing blongs to it
        //case of website's admin deleting a company
         $company=Company::find($id);
         DB::table('company_user_acceptants')->where('acceptor_id',$id)->delete();
         DB::table('company_user_views')->where('viewing_id',$id)->delete();
            foreach ($company->publishedJobs as $job)
            {
                DB::table('application')->where('job_id',$job->id)->delete();
                DB::table('job_skill')->where('job_id',$job->id)->delete();
                DB::table('saved_jobs')->where('job_id',$job->id)->delete();
                DB::table('user_job_views')->where('viewer_id',$job->id)->delete();
            }
         $company->publishedJobs()->delete();
        DB::table('messages')->where(['sendable_id','sendable_type'],[$id,'App\Models\Company'])
            ->orWhere(['receivable_id','receivable_type'],[$id,'App\Model\Company'])->delete();
        DB::table('notifications')->where(['causable_id','causable_type'],[$id,'App\Models\Company'])
            ->orWhere(['notifiable_id','notifiable_type'],[$id,'App\Model\Company'])->delete();
        DB::table('reports')->where(['sendable_id','sendable_type'],[$id,'App\Models\Company'])
            ->orWhere(['receivable_id','receivable_type'],[$id,'App\Model\Company'])->delete();
        foreach ($company->employees as $user)
            $user->currentCompany()->disassociate();
        foreach ($company->managingUsers as $user)
            $user->managingCompany()->disassociate();
        DB::table('user_notifying_company')->where('company_id',$id)->delete();
         $company->delete();
         return redirect('manage-reports');
    }
}
