<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\JobOpportunity;
use App\Models\User;


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
        {//TODO process message in view
            redirect()->back()->with('warning','you already are in user account!');
        }
    }
    public function manageJobs(){
        if (auth()->user()->logged_as_company==false)
            return redirect()->back();
        $company = auth()->user()->managingCompany;
        $publishedJobs=$company->publishedJobs;
        $publishedJobs=$publishedJobs->sortByDesc('created_at');
        return view('company_published_jobs',['company' => $company , 'publishedJobs' => $publishedJobs]);
    }
    public function notifications(){
        if (auth()->user()->logged_as_company==false)
            return redirect()->back();
        $company = auth()->user()->managingCompany;
        $notifications=$company->notifications;
        $notifications=$notifications->sortByDesc('created_at');
        return view('company-notifications',['company' => $company , 'notifications' => $notifications]);
    }
    public function messeging(){
        $user=auth()->user();
        $company=$user->managingCompany;
        if($user->logged_as_company==false)
            return redirect()->back();
        $messegingUsers=$company->userAcceptants->unique();

        return view('companyMesseging',['company'=>$company, 'messegingUsers'=>$messegingUsers]);
    }
    public function postJob(Request $request){
        //dd($request);
        $user=auth()->user();
        //if logged as a company redirect back
        if($user->logged_as_company==false)
        {
            return redirect()->back();
        }
        $company=$user->managingCompany;
        //validation
        $this->validate($request, [
            'title' => 'required|regex:/^[\pL\s\-]+$/u',
            'remote'=>'nullable',
            'transport'=>'boolean',
            'city'=>'regex:/^[\pL\s\-]+$/u|nullable',
            'country'=>'regex:/^[\pL\s\-]+$/u|nullable',
            'role'=> 'required|string',
            'experience'=>'required|numeric',
            'salary'=>'required|numeric',
            'description'=>'required',
        ]);

        //make an new instance
        //job attributes
        $job = new JobOpportunity();
        $job->title=$request->input('title');
        if($request->input('remote')!= null)
        {
            $job->remote=$request->input('remote');
            $job->city=null;
            $job->country=null;
        }
        else
            $job->remote=0;
        if($request->input('transport')!= null)
            $job->transportation=$request->input('transport');
        else
            $job->transportation=0;
        $job->city=$request->input('city');
        $job->country=$request->input('country');
        $job->role=$request->input('role');
        $job->required_experience=$request->input('experience');
        $job->salary=$request->input('salary');
        $job->description=$request->input('description');
        $job->publishable_id=$company->id;
        $job->publishable_type='App\Models\Company';

        $job->save();

        //job relations
        $job->industry()->associate($request->input('industry'));
        $job->typeOfPosition()->associate($request->input('position'));
        $job->requiredSkills()->attach($request->input('skills'));
        $job->save();
        //TOD8O make a new notification to users that are interested in this company
        $notifiedUsers=$company->notifiedUsers;
        foreach ($notifiedUsers as $user)
        {
            $notification=new Notification();
            $notification->body='A company you are interested in : '.$company->name.' has posted a new job opportunity,check it out!';
            $notification->type='new job';
            $notification->notifiable_id=$user->id;
            $notification->notifiable_type='App\Models\User';
            $notification->causable_id=$company->id;
            $notification->causable_type='App\Models\Company';
            $notification->notification_url='/jobs/'.$job->id;
            $notification->save();
        }

        return redirect('/manage-company-jobs');
    }
}

