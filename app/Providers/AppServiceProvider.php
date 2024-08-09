<?php

namespace App\Providers;

use App\Models\EducationType;
use App\Models\User;
use App\Policies\EducationTypePolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Paginator::useBootstrapFive();
        Paginator::defaultView('vendor.pagination.bootstrap-5');

        Gate::before(function ($user, $ability) {
            return $user->hasRole('founder') ? true : null;
        });

        Gate::policy(User::class, UserPolicy::class);
        Gate::policy(EducationType::class, EducationTypePolicy::class);
        Gate::policy(User::class, UserPolicy::class);
        Gate::policy(Role::class, RolePolicy::class);
    }
}
