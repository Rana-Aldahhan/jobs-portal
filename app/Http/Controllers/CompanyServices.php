<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobOpportunity;

class CompanyServices extends Controller
{
    public function switchToUserAccount(){
        if(auth()->user()->logged_as_company== false)
            return redirect()->back();
        if(!is_null(auth()->user()->managing_company_id))//user has a company account
            {
                $user=auth()->user();
                $user->logged_as_company=false;
                $user->save();
                return redirect('/home');
            }
        else//user doesn't have a company account
        {//TODO proccess message in view
            redirect()->back()->with('warning','you already are in user account!');
        }
    }
    public function manageJobs(){
        if (auth()->user()->logged_as_company==false)
            return redirect()->back();
        $company = auth()->user()->managingCompany;
        $publishedJobs=$company->publishedJobs;
        return view('company_published_jobs',['company' => $company , 'publishedJobs' => $publishedJobs]);
    }
    public function notifications(){
        if (auth()->user()->logged_as_company==false)
            return redirect()->back();
        $company = auth()->user()->managingCompany;
        $notifications=$company->notifications;
        return view('company-notifications',['company' => $company , 'notifications' => $notifications]);
    }
    public function messeging(){
        $user=auth()->user();
        $company=$user->managingCompany;
        if($user->logged_as_company==false)
            return redirect()->back();
        $messegingUsers=$company->acceptants;
        
        return view('companyMesseging',['company'=>$company, 'messegingUsers'=>$messegingUsers]);
    }
    public function postJob($request){
        $user=auth()->user();
        //if logged as a company redirect back
        if($user->logged_as_company==false)
        {
            return redirect()->back();
        }
        $company=$user->managingCompany;
        //validation
        $this->validate($request, [
            'title' => 'required|alpha',
            'remote'=>'boolean|required',
            'transport'=>'boolean',
            'city'=>'alpha',
            'country'=>'alpha',
            'role'=> 'required|alpha',
            'experience'=>'required|numeric',
            'salary'=>'required|numeric',
            'description'=>'required'
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
        $job->required_experience=$request->inut('experience');
        $job->salary=$request->input('salary');
        $job->description=$request->input('description');
        //job relations
        $job->industry()->attach($request->input('industry'));
        $job->typeOfPosition()->attach($request->input('position'));
        $job->requiredSkills()->attach($request->input('skills'));
        $job->publishable_id=$company->id;
        $job->publishable_type='App\Models\Company';

        $job->save();
        return redirect('/manage-company-jobs');
    }
}

