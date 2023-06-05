<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);
        view()->composer('Admin.section.header', function ($view) {
            $commentUnapprovedCount = Comment::whereApproved(0)->count();
            $commentApprovedCount = Comment::whereApproved(1)->count();
            $userCount = User::count();
//            $paymentUnsuccessfulCount = Payment::where('payment',0)->count();
//            $paymentSuccessCount = Payment::where('payment',1)->count();
            $view->with([
                'commentUnapprovedCount' => $commentUnapprovedCount,
                'commentApprovedCount' => $commentApprovedCount,
                'userCount' => $userCount,
//                'paymentUnsuccessfulCount' => $paymentUnsuccessfulCount,
//                'paymentSuccessCount' => $paymentSuccessCount,
            ]);


        });

    }
}
