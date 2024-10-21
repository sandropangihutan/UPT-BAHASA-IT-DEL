<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('Admin', function ($user) {
            return $user->role->id == 1;
        });

        Gate::define('Mahasiswa', function ($user) {
            return $user->role->id == 2;
        });

        Gate::define('Dosen/Staff', function ($user) {
            return $user->role->id == 3;
        });

        Gate::define('Masyarakat', function ($user) {
            return $user->role->id == 4;
        });
    }
}
