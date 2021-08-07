<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Industry;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    public function showProfile()
    {
        if (auth()->user()->logged_as_company==false)
            abort(403);
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


    public function edit()
    {
        $company=Company::find(auth()->user()->managing_company_id);
        $company->load('industry','managingUsers');
        $industries=Industry::all();
        return view('company-profile-edit' , ['company'=>$company,'industries'=>$industries]);

    }


    public function update(Request $request)
    {
        //fetch company record
        $company=Company::find(auth()->user()->managing_company_id);

        //validation
        $this->validate($request , [
            'name'=>'required',
            'email' => ['required','email',Rule::unique('companies','email')->ignore($company->id)],
            'website_url'=>['URL',Rule::unique('companies','website_url')->ignore($company->id)],
            'phone_number'=>['required','numeric',Rule::unique('companies','phone_number')->ignore($company->id)],
            'employees_count'=>'numeric|required',
            'city'=>'regex:/^[\pL\s\-]+$/u|required',
            'country'=>'regex:/^[\pL\s\-]+$/u|required',
            'admin1'=>'email|nullable|exists:users,email',
            'admin2'=>'email|nullable|exists:users,email',
            'admin3'=>'email|nullable|exists:users,email',
            'logo' => 'image|nullable|max:1999',
            'certificate' =>'nullable|max:1999',
        ]);
        //company's attributes
        $company->name=$request->input('name');
        $company->email=$request->input('email');
        $company->website_url=$request->input('website_url');
        $company->phone_number=$request->input('phone_number');
        $company->employees_count=$request->input('employees_count');
        $company->city=$request->input('city');
        $company->country=$request->input('country');
        $company->slogan=$request->input('slogan');
        $company->about=$request->input('about');

        if($request->hasFile('logo')){
            if($company->profile_thumbnail != 'companydefault.png')
                unlink(storage_path('app/public/profiles/'.$company->profile_thumbnail));
            // Get filename with the extension
            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('logo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('logo')->storeAs('public/profiles', $fileNameToStore);
        }
        else {
            if($company->profile_thumbnail == 'companydefault.png')
                $fileNameToStore = 'companydefault.png';
            else
                $fileNameToStore=$company->profile_thumbnail;
        }

        $company->profile_thumbnail=$fileNameToStore;

        //certificate processing
        if($request->hasFile('certificate')){
            unlink(storage_path('app/public/profiles/'.$company->certificate));
            // Get filename with the extension
            $filenameWithExt = $request->file('certificate')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('certificate')->getClientOriginalExtension();
            // Filename to store
            $certificateFileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('certificate')->storeAs('public/certificates', $certificateFileNameToStore);
            $company->certificate=$certificateFileNameToStore;
        }

        //company's relations
        $company->industry()->disassociate();
        $company->industry()->associate($request->input('industry'));
        //TODO add new column to user
        /*
        $adminEmails=collect([$request->input('admin1'),$request->input('admin2'),$request->input('admin3')]);
        $managing_users= User :: whereIn('email',$adminEmails)->get();
        $company->save();
        $company-> managingUsers()->saveMany($managing_users);
        $company->managingUsers()->save(auth()->user());
        */
        $company->save();

        return redirect('/company-profile');
    }


    public function destroy($id)
    {
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
