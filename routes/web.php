<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route:: put('/switch-to-company-account',[UserServices :: class ,'switchToCompanyAccount'])->middleware('auth');
Route::put('/switch-to-user-account',[CompanyServices :: class ,'switchToUserAccount'])->middleware('auth');
Route :: get('/home',function (){
    return view ('home');
});
Route :: get ('/explore',[UserServices :: class , 'explore']);
Route :: get ('/explore/company-search-results',[UserServices:: class ,'companySearchResults']);
Route :: get ('/explore/people-search-results',[UserServices:: class ,'peopleSearchResults']);
Route :: get('/job-search', function (){
    return view ('job-search');
});
Route :: get ('/create-job', function (){
    return view ('create-job');
})->middleware('auth');
Route :: get ('/create-company',[UserServices :: class , 'showCreateCompany'])->middleware('auth');

Route :: get('/profile' , [UserController :: class , 'showProfile'])->middleware('auth');
Route::get('/profile/edit',[UserController::class,'edit'])->middleware('auth');
Route:: put ('/profile/edit',[UserController::class,'update'])->middleware('auth');

Route :: get ('/saved-jobs',[UserServices:: class ,'savedJobs'])->middleware('auth');
Route :: get ('/published-jobs',[UserServices:: class ,'publishedJobs'])->middleware('auth');
Route :: get ('/applied-jobs',[UserServices:: class ,'appliedJobs'])->middleware('auth');
Route :: get ('/notifications',[UserServices:: class ,'notifications'])->middleware('auth');

Route :: get('companies/{id}',[CompanyController :: class,'show'])->name('companyProfile');//show company
Route :: post('companies/{id}' , [UserServices :: class ,'getNotified'])
->middleware('auth');//start getting notifications from a company
Route :: delete('companies/{id}' , [UserServices :: class ,'stopNotification'])
->middleware('auth');//stop getting notifications from a company

Route::get('companies/{id}/report', [UserServices :: class ,'reportCompany'])
->middleware('auth');//report company
Route :: post('companies/{id}/report', [UserServices :: class ,'sendCompanyReport'])
->middleware('auth');//make a report and save it to DB

Route::get('/jobs/{id}',[JobOpportunityController :: class ,'show']);




