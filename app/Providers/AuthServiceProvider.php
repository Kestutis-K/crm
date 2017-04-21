<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        //Auth gates for: only admin
        Gate::define('admin', function ($user) {
            return in_array($user->role_id, [1]);
        });

        Gate::define('admin_manager', function ($user) {
            return in_array($user->role_id, [1,2]);
        });

        Gate::define('all', function ($user) {
            return in_array($user->role_id, [1,2,3]);
        });
    }
}
