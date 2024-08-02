<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;
use App\Models\EducationType;
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
        Gate::policy(User::class, UserPolicy::class);
        Gate::policy(EducationType::class, EducationTypePolicy::class);
    }
}
