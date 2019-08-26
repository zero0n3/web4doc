<?php

namespace App\Policies;

use App\User;
use App\Models\Checkup;
use Illuminate\Auth\Access\HandlesAuthorization;

class CheckupPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any checkups.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the checkup.
     *
     * @param  \App\User  $user
     * @param  \App\Checkup  $checkup
     * @return mixed
     */
    public function view(User $user, Checkup $checkup)
    {
        //
        return $user->id === $checkup->athlete->user_id;
    }

    /**
     * Determine whether the user can create checkups.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the checkup.
     *
     * @param  \App\User  $user
     * @param  \App\Checkup  $checkup
     * @return mixed
     */
    public function update(User $user, Checkup $checkup)
    {
        return $user->id === $checkup->athlete->user_id;
    }

    /**
     * Determine whether the user can delete the checkup.
     *
     * @param  \App\User  $user
     * @param  \App\Checkup  $checkup
     * @return mixed
     */
    public function delete(User $user, Checkup $checkup)
    {
        return $user->id === $checkup->athlete->user_id;
    }

    /**
     * Determine whether the user can restore the checkup.
     *
     * @param  \App\User  $user
     * @param  \App\Checkup  $checkup
     * @return mixed
     */
    public function restore(User $user, Checkup $checkup)
    {
        return $user->id === $checkup->athlete->user_id;
    }

    /**
     * Determine whether the user can permanently delete the checkup.
     *
     * @param  \App\User  $user
     * @param  \App\Checkup  $checkup
     * @return mixed
     */
    public function forceDelete(User $user, Checkup $checkup)
    {
        return $user->id === $checkup->athlete->user_id;
    }
}
