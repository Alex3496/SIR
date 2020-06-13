<?php

namespace App\Providers;

use App\Policies\{TariffPolicy,PostPolicy};
use App\{Tariff,Post};

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Tariff::class => TariffPolicy::class,
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //DEFIENE GATES IN HERE
        // Protect routes if the user isnt an admin
        Gate::define('manager-area',function($user){
            return $user->hasAnyRoles(['admin','Editor']);
        });

        Gate::define('admin-only',function($user){
            return $user->hasRole('admin');
        });
    }
}
