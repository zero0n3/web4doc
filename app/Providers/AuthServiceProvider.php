<?php

namespace App\Providers;

use App\Models\Athlete;
use App\Models\Checkup;
use App\Policies\AthletePolicy;
use App\Policies\CheckupPolicy;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Athlete::class=>AthletePolicy::class,
        Checkup::class=>CheckupPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-athlete',function(User $user, Athlete $athlete){
            return $user->id === $athlete->user_id;
        });
        //
    }
}
