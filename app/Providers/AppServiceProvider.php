<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer('*', function($view){
            $view->with(['newNotifications'=>\Auth::user()!=null? \Auth::user()->notifications->where('seen',0)->count() >0:false
                ,'notificationCount'=>\Auth::user()!=null? \Auth::user()->notifications->where('seen',0)->count():false
            ,'newMessages'=>\Auth::user()!=null? \Auth::user()->receivedMessages->where('seen',0)->count() >0:false
                ,'messagesCount'=>\Auth::user()!=null?\Auth::user()->receivedMessages->where('seen',0)->count():false
                ,'newCompanyNotifications'=>\Auth::user()!=null && Auth::user()->managingCompany!=null ? \Auth::user()->managingCompany->notifications->where('seen',0)->count() >0:false
                ,'companyNotificationCount'=>\Auth::user()!=null && Auth::user()->managingCompany!=null ? \Auth::user()->managingCompany->notifications->where('seen',0)->count():false
                ,'newCompanyMessages'=>\Auth::user()!=null && Auth::user()->managingCompany!=null ? \Auth::user()->managingCompany->receivedMessages->where('seen',0)->count() >0:false
                ,'companyMessagesCount'=>\Auth::user()!=null && Auth::user()->managingCompany!=null ?\Auth::user()->managingCompany->receivedMessages->where('seen',0)->count():false
            ]);
        });

    }
}
