<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
