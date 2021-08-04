<?php

namespace App\Providers;

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
            $view->with(['newNotifications'=> \Auth::user()->notifications->where('seen',0)->count() >0
                ,'notificationCount'=>\Auth::user()->notifications->where('seen',0)->count()
            ,'newMessages'=> \Auth::user()->receivedMessages->where('seen',0)->count() >0
                ,'messagesCount'=>\Auth::user()->receivedMessages->where('seen',0)->count()]);
        });

    }
}
