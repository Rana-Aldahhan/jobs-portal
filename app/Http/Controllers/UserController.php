<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\Skill;
use App\Models\School;
use App\Models\Language;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showProfile(){
        if (auth()->user()->logged_as_company==true)
            return redirect()->back();
        $user= auth()->user();
        $school=$user->school;
        $skills=$user->skills;
        $industry=$user->industry;
        $languages=$user->languages;
        $workplaces=$user->workPlaces;
        $colleagues=$user->colleagues;
        $usersReachCount=0;
        $companiesReachCount=0;
        //count users reaches to this profile of the last month

        //delete every reach created before a month
        $expired_reaches=$user->userViewers()->where('created_at', '>',now()->subDays(30))->get();
        $expired_reaches->delete();
        //count this month reaches with distinct viewers
        $usersReachCount=DB :: table('user_user_views')->select('viewing_id')->where('viewer_id',$user->id)->distinct()->get()->count();

        //count company reaches to this profile of the last month

        //delete every reach created before a month
        $expired_reaches=$user->companyViewers()->where('created_at', '>',now()->subDays(30))->get();
        $expired_reaches->delete();
        //count this month reaches with distinct viewers
        $companyReachCount=DB :: table('user_user_views')->select('viewing_id')->where('viewer_id',$user->id)->distinct()->get()->count();



        return view('user-profile', ['user' => $user,'school'=>$school,'skills'=> $skills,'industry'=>$industry,
        'languages'=>$languages,'workplaces'=>$workplaces,'colleagues'=>$colleagues,'usersReachCount'=>$usersReachCount,
        'companiesReachCount'=>$companiesReachCount]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User :: paginate(5);
        return view();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // return view()
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
        $loggedUser=auth()->user();//can be null
        $user=User::find($id);
        $school=$user->school;
        $skills=$user->skills;
        $workPlaces=$user->workPlaces;
        $languages=$user->languages;
        $colleagues=$user->sentColleagues()->where('approved',true)->get();
        $colleagues=$colleagues->push($user->recievedColleagues()->where('approved',true)->get());
        $colleagues=$colleagues->flatten();
        $userPublishedJobs=$user->publishedJobs;

        $showAddColleagues=true;// cancel colleagues request
        $showCancelRequest=false;
        $showApproveButton=false;//show remove request
        $showMessage=false;


        if(Auth :: check())//case logged in
        {
            if($user->logged_as_company==false)//logged as user
            {
                //show colleagues states
                $sender=$loggedUser->sentColleagues()->find($id);
                $received=$loggedUser->recievedColleagues()->find($id);
                if(!is_null($sender) || !is_null($received))// case a user has sent a colleague request to another
                {
                    $showAddColleagues=false;
                    if(!is_null($sender))
                    {
                        $showCancelRequest=true;
                    }
                    if(!is_null($received))
                    {
                        $showApproveButton=true;
                    }
                }
                //show message in case a user has applied and has been approved to another user job
                $acceptor=$loggedUser->userAcceptors()->find($id);
                $acceptant=$loggedUser->userAcceptants()->find($id);
                if(!is_null($acceptor) || !is_null($acceptant))
                {
                    $showMessage=true;
                }
                // increment the showed user's reaches by users
                $user->userViewers()->attach($loggedUser);

            }
            else//logged as company
            {
                //show message in case a user has applied and has been approved to a company's job
                $company = Company::find($loggedUser->managing_company_id);
                $companyAcceptor=$user->companyAcceptors()->find($company->id);
                if(!is_null($companyAcceptor))
                {
                    $showMessage=true;
                }
                // increment the showed user's reaches by companies
                $user->companyViewers()->attach($company);
            }
        }
        return view('showUser',['loggedUser'=>$loggedUser,'user'=>$user,'school'=>$school,'skills'=>$skills, 'workPlaces'=>$workPlaces,
        'languages'=>$languages, 'colleagues'=>$colleagues,'userPublishedJobs'=> $userPublishedJobs,
        'showAddColleagues'=>$showAddColleagues,'showCancelRequest'=>$showCancelRequest,'showApprovedButton'=>$showApproveButton,
        'showMessage'=>$showMessage]) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()//edit's form
    {
        $id= auth()->user()->id;
        $user= User :: find( $id);
        $skills = Skill :: all();
        $languages = Language :: all();
        //fetch user skills and languages
        $user_skills= $user ->skills;
        $user_languages = $user->languages;
        $user_school=$user->school;
        $user_workplaces=$user->workPlaces;

        return view('profile-edit', ['user' => $user , 'skills' => $skills ,'languages' => $languages,
                                     'user_languages' => $user_languages , 'user_skills' =>$user_skills,
                                     'school'=>$user_school,'workplaces'=>$user_workplaces]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id= auth()->user()->id;
        $user= User :: find( $id);

        //validation
        $this->validate ($request , [
            'name' => 'required | alpha' ,
            'email' => 'required | unique |email',
            'birth-date' => 'date' ,
            'phone-number' => 'numeric' ,
            'city' => 'alpha' ,
            'country' => 'alpha' ,
            'looking-for-job' => 'boolean',
            'years-of-experience' => 'numeric',
            'role'=>'alpha',
            'current-job-title' => 'alpha',
            'current-company-name' => 'alpha',
        ]);

        // TODO image process
        //TODO work places processing

        //edit
        $user->name= $request->input('name');
        $user->current_job_title=$request->input('current_job_title');
        //process current company
        $company=Company :: find(request()->input('current_company_name'));
        if(!is_null($company))
        {
            $user->current_company_id = $company->id;

        }
        $user->current_company_name=request()->input('current_company_name');
        $user->role= request() -> input('role');
        $user->current_job_title=request()->input('current_job_title');
        $user->city = request()->input('city');
        $user->country= request()->input('country');
        $user->looking_for_job=request()->input('looking-for-job');
        $user->about= request()->input('about');
        //search for a school with the same input name
        $school=School :: where('name' ,request()->input('school'));
        //case there is a school of the same name
        if(!is_null($school))
        {
            //no school is set before
            if($user->school == null)
                { $user->current_school_id = $school->id;
                }
            //school is set before
            else
            {    //set school is different from input
                if($user->school->name != $school->name)
                {
                    $user->current_school_id = $school->id;
                }

            }
        }
        //case there is no school with the same name
        else {
            $school = new school();
            $school->name= request()->input('school');
            $school->save();
            $school = School:: where('name',request()->input('school'));//edit
            $user->school_id=$school->id;
        }
        $user->years_of_experience= request()->input('years_of_experience');
        $user->phone_number= request()->input('phone_number');
        $user->skills()->saveMany(request()->input('skills'));
        $user->languages()->saveMany(request()->input('languages'));
        //save
        $user->save();
        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id

     */
    public function destroy($id)
    {
        //case of website's admin deleting a user
        $user=User::find($id);
        $user->delete();
        return redirect('manage-reports');
    }
}
