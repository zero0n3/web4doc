<?php

namespace App\Policies;

use App\User;
use App\Models\Athlete;
use Illuminate\Auth\Access\HandlesAuthorization;

class AthletePolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any athletes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the athlete.
     *
     * @param  \App\User  $user
     * @param  \App\Athlete  $athlete
     * @return mixed
     */
    public function view(User $user, Athlete $athlete)
    {
        return $user->id === $athlete->user_id;
    }

    /**
     * Determine whether the user can create athletes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the athlete.
     *
     * @param  \App\User  $user
     * @param  \App\Athlete  $athlete
     * @return mixed
     */
    public function update(User $user, Athlete $athlete)
    {
        return $user->id === $athlete->user_id;
    }

    /**
     * Determine whether the user can delete the athlete.
     *
     * @param  \App\User  $user
     * @param  \App\Athlete  $athlete
     * @return mixed
     */
    public function delete(User $user, Athlete $athlete)
    {
        return $user->id === $athlete->user_id;
    }

    /**
     * Determine whether the user can restore the athlete.
     *
     * @param  \App\User  $user
     * @param  \App\Athlete  $athlete
     * @return mixed
     */
    public function restore(User $user, Athlete $athlete)
    {
        return $user->id === $athlete->user_id;
    }

    /**
     * Determine whether the user can permanently delete the athlete.
     *
     * @param  \App\User  $user
     * @param  \App\Athlete  $athlete
     * @return mixed
     */
    public function forceDelete(User $user, Athlete $athlete)
    {
        return $user->id === $athlete->user_id;
    }
}
