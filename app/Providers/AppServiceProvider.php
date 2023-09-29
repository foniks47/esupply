<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\Gate;
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
        // view()->composer('welcome', function ($view) {
        //     $view->with('setting', Setting::select('name', 'title', 'logo')->firstWhere('id', 1));
        // });
        view()->composer(['layouts.master'], function ($view) {
            $view->with('notifpicapproverequest', Transaction::where('pic_approver', auth()->user()->id_user_me)->where('purchase_type', 'Purchase Request Proposal')->where('pic_approval', 'Pending')->count())
                ->with('notifpicapprovedirect', Transaction::where('pic_approver', auth()->user()->id_user_me)->where('purchase_type', 'Direct Pick Up')->where('pic_approval', 'Pending')->count())
                ->with('notiftluserapproverequest', Transaction::where('tl_approver', auth()->user()->id_user_me)->where('purchase_type', 'Purchase Request Proposal')->where('tl_approval', 'Pending')->count())
                ->with('notiftlgamapproverequest', Transaction::where('tlgam_approver', auth()->user()->id_user_me)->where('purchase_type', 'Purchase Request Proposal')->where('tlgam_approval', 'Pending')->count());
        });
        // $notiftluserapproverequest = Transaction::where('tl_approver', auth()->user()->id_user_me)->where('purchase_type', 'Purchase Request Proposal')->where('tl_approval', 'Pending')->count();
        // $notiftlgamapproverequest = Transaction::where('tlgam_approver', auth()->user()->id_user_me)->where('purchase_type', 'Purchase Request Proposal')->where('tlgam_approval', 'Pending')->count();

        Gate::Define('admin', function (User $user) { //use on 'can'/'canany' blade
            return $user->priv === 'admin';
        });
        Gate::Define('pic', function (User $user) {
            return $user->priv === 'pic';
        });
        Gate::Define('tluser', function (User $user) {
            return $user->priv === 'tluser';
        });
        Gate::Define('tlgam', function (User $user) {
            return $user->priv === 'tlgam';
        });
        // Gate::define('direct', function ($user = null) {
        //     // $allowed_addresses = json_decode(env('REMOTE_ADDRESSES'));
        //     $allowed_addresses[] = ['172.21.25.205'];
        //     return in_array(request()->ip(), $allowed_addresses);
        // });
    }
}
