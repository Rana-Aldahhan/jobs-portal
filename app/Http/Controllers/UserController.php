<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\Skill;
use App\Models\School;
use App\Models\Language;
class UserController extends Controller
{
    public function showProfile(){
        if (auth()->user()->logged_as_company==true)
            return redirect()->back();
        $user= auth()->user();
        return view('profile', ['user' => $user]);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    { 
        $id= auth()->user()->id;
        $user= User :: find( $id);
        $skills = Skill :: all();
        $languages = Language :: all();
        //fetch user skills and languages
        $user_skills= $user ->skills;
        $user_languages = $user->languages;
        return view('profile-edit', ['user' => $user , 'skills' => $skills ,'languages' => $languages,
                                     'user_languages' => $user_languages , 'user_skills' =>$user_skills]);
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

        //validition
        $this->validate ($request , [
            'name' => 'requied | alpha' ,
            'email' => 'requied | unique |email',
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
        //TODO work places prossecing

        //edit
        $user->name= $request()->input('name');
        $user->current_job_title=$request()->input('current_job_title');
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
            {    //set school is diffrent from input
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
