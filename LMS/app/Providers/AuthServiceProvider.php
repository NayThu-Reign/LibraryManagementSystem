<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Librarian;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        Gate::define('able-to-login', function($role) {
            return $role->id == 1;
        });

        Gate::define('delete-book', function($user) {
            return $user->roles_id == 1;
        });

        Gate::define('suspend-student', function($user) {
            return $user->roles_id == 1;
        });

        Gate::define('unsuspend-student', function($user) {
            return $user->roles_id == 1;
        });

        Gate::define('issue-book', function($user) {
            return $user->roles_id == 2;
        });

        Gate::define('return-book', function($user) {
            return $user->roles_id == 2;
        });

        Gate::define('edit-book', function($user) {
            return $user->roles_id == 1;
        });

        Gate::define('delete-book', function($user) {
            return $user->roles_id == 1;
        });

        Gate::define('add-author', function($user) {
            return $user->roles_id == 1;
        });
        Gate::define('edit-author', function($user) {
            return $user->roles_id == 1;
        });

        Gate::define('delete-author', function($user) {
            return $user->roles_id == 1;
        });

        Gate::define('add-category', function($user) {
            return $user->roles_id == 1;
        });


    }
}
