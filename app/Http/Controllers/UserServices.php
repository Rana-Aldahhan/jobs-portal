<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\Report;
use App\Models\School;
use App\Models\Industry;
//TODO check if logged as comapny or as user <and redirect back where not allowed
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
                return redirect('/company_home');//TODO add a company  home URL
            }
        else//user have not created a company
        {//TODO proccess message in view
            redirect()->back()->with('warning','you don\'t have a company account yet!');
        }
    }
    public function explore($request){
        //if logged as company redirect to back
        if(Auth :: check)
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
               $recomendedCompanies = Company :: where('industry' , auth()->user()->industry)->get(); 
               $recomendedPeople = User::where('industry',auth()->user()->industry)->get();
            }
            if(!is_null(auth()->user()->school_id))
            {
                //add people of the same school to recomended people collection
                $additionalRecomendedPeople= User :: where('school_id' ,auth()->user()->school_id);
                $recomendedPeople->push($additionalRecomendedPeople);
                $recomendedPeople = $recomendedPeople->flatten();
            }
        }
        else//case not logged in, recommend people and companies of the selected industy ,school
        {
            if(!is_null($request->companyIndustry))
            {
                $recomendedCompanies = Company :: where('industry' , $request->companyIndustry) ->get(); 
            }
            if(!is_null($request->peopleIndustry )){
                $recomendedPeople = User::where('industry',$request->peopleIndustry)->get();
            }
            if(!is_null($request->peopleEducation)){
                $school= School :: where('name' ,$request->peopleEducation)->get() ;
                if($school !=null)
                {
                $additionalRecomendedPeople= User :: where('school_id' ,$school->id);
                $recomendedPeople ->push($additionalRecomendedPeople);
                $recomendedPeople = $recomendedPeople->flatten();
                }
            }
        }
        $recomendedPeople=$recomendedPeople->shuffle();
        $recomendedCompanies=$recomendedCompanies->shuffle();
        $industries= Industry :: all();

        return view('explore',['recomendedCompanies'=> $recomendedCompanies ,
                                'recomendedPeople' => $recomendedPeople,
                                'industries' => $industries]);

    }
    public function showCreateCompany() {
        if (auth()->user()->logged_as_company==true)
            return redirect()->back();
        $is_managing_company =false;
        if(!is_null(auth()->user()->managing_company_id))
        {
            $is_managing_company = true;
            return view('/home',['is_managing_company'=> $is_managing_company])->with ('warning','you can only create one company');
        }
        return view('create-company',['is_managing_company'=> $is_managing_company]);

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
        $user = auth()->user();
        $publishedJobs=$user->publishedJobs;
        return view('published_jobs',['user' => $user , 'publishedJobs' => $publishedJobs]);
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
        return view('notifications',['user' => $user , 'notifications' => $notifications]);
    }
    public function companySearchResults($request){
        if(Auth :: check())
        { 
            if (auth()->user()->logged_as_company==true)
                return redirect()->back();
        }
        $searchResults = Company:: where ('name' , $request->input('companySearchName'))->get();
        return view('company_search_results', ['searchResults',$searchResults]);
    }
    public function peopleSearchResults($request){
        if(Auth :: check())
        { 
            if (auth()->user()->logged_as_company==true)
                return redirect()->back();
        }
        $searchResults = User:: where ('name' , $request->input('peopleSearchName'))->get();
        return view('people_search_results', ['searchResults',$searchResults]);
    }
    public function getNotified($id){
        $user= auth()->user();
        $company= Company :: find($id);
        $user->notifyingCompanies()->attach($company);
        return redirect()->route('companyProfile',['id',$id]);
    }
    public function stopNotification($id){
        $user= auth()->user();
        $company= Company :: find($id);
        $user->notifyingCompanies()->detach($company);
        return redirect()->route('companyProfile',['id',$id]);
    }
    public function reportCompany($id){
       // TODO if we are logged in as a company we can't report another company:redirect + message
        return view('report',['id'=>$id]);
    }
    public function sendCompanyReport($request,$id){
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

        return redirect('companies\{id}');

    }





    

















}


