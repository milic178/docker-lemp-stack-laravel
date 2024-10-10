<?php

namespace App\Policies;

use App\Models\Jobs;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class JobsPolicy
{

    public function edit(User $user, Jobs $jobs)
    {
        return $jobs->employer->user->is($user);
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
    public function view(User $user, Jobs $jobs): bool
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
    public function update(User $user, Jobs $jobs): bool
    {
        return $jobs->employer->user->is($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Jobs $jobs): bool
    {
        return $jobs->employer->user->is($user);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Jobs $jobs): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Jobs $jobs): bool
    {
        //
    }
}
