<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Wine;
use Illuminate\Auth\Access\Response;

class WinePolicy
{
    public function adminWine(User $user): bool
    {
        return $user->id <= 2;
//            ? Response::allow()
//            : Response::deny('You must be an administrator.');
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Wine $wine): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Wine $wine): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Wine $wine): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Wine $wine): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Wine $wine): bool
    {
        //
    }
}
