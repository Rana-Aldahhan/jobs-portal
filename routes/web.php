<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyServices;
use App\Http\Controllers\JobOpportunityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserServices;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route :: get('/', function () {
    return redirect('/home');
});
Route::get('/1',function (){return view('companysjobs');});
Route :: put('/switch-to-company-account',[UserServices :: class ,'switchToCompanyAccount'])->middleware('auth');
Route :: put('/switch-to-user-account',[CompanyServices :: class ,'switchToUserAccount'])->middleware('auth');
Route :: get('/home',function (){if(Auth::check()) return view('withAuthHome'); else return view ('withoutAuthHome');});
Route :: get ('/explore',[UserServices :: class , 'explore']);
Route :: get ('/explore/company-search-results',[UserServices:: class ,'companySearchResults']);
Route :: get ('/explore/people-search-results',[UserServices:: class ,'peopleSearchResults']);
Route :: get('/job-search',  [UserServices:: class ,'showJobSearch']);
Route :: get ('/job-search-results', [UserServices::class ,'filterJobs' ]);
Route :: get ('/create-job', [UserServices:: class ,'showCreateJob'])->middleware('auth');
Route :: post('/create-job',[UserServices :: class , 'postJob']);
Route :: get ('/create-company',[UserServices :: class , 'showCreateCompany'])->middleware('auth');
Route :: post('/create-company',[UserServices :: class , 'postCompany'])->middleware('auth');



//company and its related functionalities
Route :: get('/company-home',function(){if(auth()->user()->logged_as_company==false) return redirect()->back(); else return view('companyHome');})->middleware('auth');
Route :: get ('company-profile',[CompanyController :: class ,'showProfile'])->middleware('auth');
//edit get form
//edit put
Route :: get ('/manage-company-jobs',[CompanyServices:: class ,'manageJobs'])->middleware('auth');
Route :: get ('/company-notifications',[CompanyServices:: class ,'notifications'])->middleware('auth');
Route :: get('/company-messeging',[CompanyServices:: class ,'messeging'])->middleware('auth');
Route :: post('/company-create-job',[CompanyServices :: class , 'postJob']);

Route :: get('/companies/{id}',[CompanyController :: class,'show']);//show company
Route :: post('/companies/{id}' , [UserServices :: class ,'getNotified'])->middleware('auth');//start getting notifications from a company
Route :: delete('/companies/{id}' , [UserServices :: class ,'stopNotification'])->middleware('auth');//stop getting notifications from a company
Route :: get('/companies/{id}/report', [UserServices :: class ,'reportCompany'])->middleware('auth');//report company
Route :: post('/companies/{id}/report', [UserServices :: class ,'sendCompanyReport'])->middleware('auth');//make a report and save it to DB
Route :: get('/companies/{id}/messages',[UserServices :: class ,'showMessagesWithCompany'])->middleware('auth');//show messages between user and company
Route :: post('/companies/{id}/messages',[UserServices :: class ,'sendMessageToCompany'])->middleware('auth');//send message to company
//jobs and its related functionalities
Route :: get('/jobs/{id}',[JobOpportunityController :: class ,'show']);
Route :: get ('/jobs/{id}/edit',[JobOpportunityController :: class ,'edit'])->middleware('auth');
Route :: put ('/jobs/{id}/edit',[JobOpportunityController :: class ,'update'])->middleware('auth');
Route :: delete('/jobs/{id}/delete',[JobOpportunityController :: class ,'destroy'])->middleware('auth');

Route :: post('/jobs/{id}/apply',[UserServices :: class ,'applyJob'])->middleware('auth');//apply to a job
Route :: delete('/jobs/{id}/withdraw-application',[UserServices :: class ,'withdrawApplication'])->middleware('auth');//apply to a job
Route :: post('/jobs/{id}/save',[UserServices :: class ,'saveJob'])->middleware('auth');//add job to save list
Route :: delete('/jobs/{id}/unsave',[UserServices :: class ,'unsaveJob'])->middleware('auth');//delete a job from saved list

Route :: get('/jobs/{id}/applicants',[JobOpportunityController :: class ,'showApplicants'])->middleware('auth');//show job's applicants
Route :: put('/jobs/{jobID}/applicants/{userID}',[JobOpportunityController :: class ,'approveApplicant'])->middleware('auth');//approve a user application
Route :: delete('/jobs/{jobID}/applicants/{userID}',[JobOpportunityController :: class ,'ignoreApplicant'])->middleware('auth');//ignore a user application
//user and its related functionalities

//logged user routes
Route ::  get('/profile' , [UserController :: class , 'showProfile'])->middleware('auth');
Route ::  get('/profile/edit',[UserController::class,'edit'])->middleware('auth');
Route ::  put ('/profile/edit',[UserController::class,'update'])->middleware('auth');//save edit changes

Route :: get ('/saved-jobs',[UserServices:: class ,'savedJobs'])->middleware('auth');
Route :: get ('/published-jobs',[UserServices:: class ,'publishedJobs'])->middleware('auth');
Route :: get ('/applied-jobs',[UserServices:: class ,'appliedJobs'])->middleware('auth');
Route :: get ('/notifications',[UserServices:: class ,'notifications'])->middleware('auth');
Route :: get('/messeging',[UserServices:: class ,'messeging'])->middleware('auth');

Route :: get('/users/{id}',[UserController :: class ,'show']);
Route :: post('/user/{id}/add-colleague',[UserServices::class , 'addColleague'])->middleware('auth');
Route :: delete('/user/{id}/cancel-colleague-request',[UserServices::class , 'cancelRequest'])->middleware('auth');
Route :: put('/user/{id}/approve-colleague',[UserServices::class , 'approveColleague'])->middleware('auth');
Route :: delete('/user/{id}/ignore-colleague',[UserServices::class , 'ignoreColleagueRequest'])->middleware('auth');
Route :: get('/users/{id}/messages',[UserServices::class , 'showMessagesWithUser'])->middleware('auth');
Route :: post('/users/{id}/messages',[UserServices::class , 'sendMessageToUser'])->middleware('auth');
Route :: get('/users/{id}/report',[UserServices::class , 'reportUser'])->middleware('auth');
Route :: post('/users/{id}/report',[UserServices::class , 'sendUserReport'])->middleware('auth');
//website admin functionalities
Route :: get('/manage-reports',[UserServices::class , 'manageReports'])->middleware('auth');
Route :: get('/manage-reports/companies/{id}',[UserServices::class , 'showCompanyReports'])->middleware('auth');
Route :: delete('/manage-reports/companies/{id}/delete',[CompanyController::class , 'destroy'])->middleware('auth');
Route :: get('/manage-reports/users/{id}',[UserServices::class , 'showUserReports'])->middleware('auth');
Route :: delete('/manage-reports/users/{id}/delete',[UserController::class , 'destroy'])->middleware('auth');



Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
