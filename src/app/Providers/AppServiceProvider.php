<?php

namespace App\Providers;

use App\Models\Jobs;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Model::preventLazyLoading();

        //change default view and css of pagination
        //Paginator::defaultView('vendor.pagination.default');
        //Paginator::useBootstrapFive();

        /* Take a look at JobsPolicy
        Gate::define('edit-job', function (User $user, Jobs $job) {
            return $job->employer->user->is($user);
        });
        */
    }
}
