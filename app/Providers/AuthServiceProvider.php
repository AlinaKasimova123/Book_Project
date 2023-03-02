<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('admin-rights', function(?User $user){
            if(Auth::check()){
                if ($user->role_id) {
                    return $user->role_id == 1;
                }
            }
        });

        Gate::define('author-rights', function(?User $user){
            if(Auth::check()){
                if ($user->role_id) {
                    return $user->role_id == 2;
                }
            }
        });
    }
}
