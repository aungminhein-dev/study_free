<?php

namespace App\Policies;

use App\Models\EducationType;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EducationTypePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view education-types');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, EducationType $educationType): bool
    {
        return $user->hasPermissionTo('view eduaction-types');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create education-types');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, EducationType $educationType): bool
    {
        return $user->hasPermissionTo('update eduaction-types');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, EducationType $educationType): bool
    {
        return $user->hasPermissionTo('delete eduaction-types');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, EducationType $educationType): bool
    {
        return $user->hasPermissionTo('restore eduaction-types');
    }

    public function forceDelete(User $user, EducationType $educationType)
    {
        //
    }
    public function manage(User $user)
    {
        return $user->can('view education-types') ||
            $user->can('create education-types') ||
            $user->can('update education-types') ||
            $user->can('edit education-types') ||
            $user->can('delete education-types');
    }
}
