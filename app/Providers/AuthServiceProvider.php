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
        // Define your model-to-policy mappings here
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Define Gate for 'admin' role
        Gate::define('is-admin', function ($user) {
            return $user->role === 'admin';
        });

        // Define Gate for 'editor' role
        Gate::define('is-editor', function ($user) {
            return $user->role === 'editor';
        });

        // Define Gate for 'user' role
        Gate::define('is-user', function ($user) {
            return $user->role === 'user';
        });
    }
}
