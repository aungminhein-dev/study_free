<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\Models\EducationType;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;
use App\Policies\EducationTypePolicy;
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
    public function boot(): void
    {
        Gate::before(function ($user, $ability) {
            return $user->hasRole('founder') ? true : null;
        });

        Gate::policy(User::class, UserPolicy::class);
        Gate::policy(EducationType::class, EducationTypePolicy::class);
        Gate::policy(User::class, UserPolicy::class);
        Gate::policy(Role::class, RolePolicy::class);
    }
}
