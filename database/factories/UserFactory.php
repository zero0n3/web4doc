<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Models\AthleteSport; //#fattoamano
use App\Models\AthleteTeam; //#fattoamano
use App\Models\Company; //#fattoamano
use App\Models\Checkup; //#fattoamano
use App\Models\Athlete; //#fattoamano
use App\Models\Team; //#fattoamano
use App\Models\Sport; //#fattoamano
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$sports =
    ['aikido',
      'archery',
      'artistic gymnastics',
      'baton twirling',
      'bodybuilding',
      'boxi',
      'cross-country equestrianis',
      'cross-country running',
      'cyclin',
      'discus throw',
      'equestrianis',
      'fencing',
      'fgure skating',
      'hoe racing',
      'judo',
      'karate',
      'kend',
      'kickboxng',
      'kung f',
      'long jup',
      'marathon',
      'mixed martial arts',
      'Muay Tha',
      'pole vault',
      'powerlifting',
      'racewalking',
      'rhythmic gymnastics',
      'sprint',
      'sumo',
      'sword-fighting',
      'trail running',
      'trampolining',
      'tumbling',
      'ultimate',
      'walking',
      'weightlifting',
      'wrestling'
    ];

$sex =
    ['M',
      'F',
];

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});


//#fattoamano
$factory->define(App\Models\Team::class, function (Faker $faker) {

    return [
        'name' => $faker->company,
        'status' => 0,
    ];
});


//#fattoamano
$factory->define(App\Models\Team::class, function (Faker $faker) {
    $faker = \Faker\Factory::create();
    \Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($faker);
    
    return [
        'team_name' => $faker->team,
        'team_status' => 0,
        'company_id' => Company::inRandomOrder()->first()->id,

    ];
});

//#fattoamano
$factory->define(App\Models\Sport::class, function (Faker $faker) use ($sports){

    return [
        'name' => $faker->unique()->randomElement($sports),
        'status' => 0,
    ];
});


//#fattoamano
$factory->define(App\Models\Athlete::class, function (Faker $faker) use ($sex){
    
    return [
        'name' => $faker->name,
        'status' => 0,
        'dob' => $faker->date,
        'sex' => $faker->randomElement($sex),
        'company_id' => Company::inRandomOrder()->first()->id,

    ];
});



//#fattoamano
$factory->define(App\Models\Checkup::class, function (Faker $faker){
    
    return [
        'date' => $faker->date,
        'altezza' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'peso' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'tricipite_R' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'tricipite_L' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'petto_R' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'petto_L' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'ascella_R' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'ascella_L' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'scapola_R' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'scapola_L' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'iliaca_R' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'iliaca_L' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'addominale_R' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'addominale_L' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'coscia_R' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'coscia_L' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'spalle' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'petto' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'anche' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'braccio_R' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'braccio_L' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'gamba_R' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'gamba_L' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'spirometria' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'massa_grassa' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'bmi' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        'frq_riposo' => $faker->numberBetween($min = 1, $max = 50),
        'frq_stress' => $faker->numberBetween($min = 1, $max = 50),
        'frq_1min' => $faker->numberBetween($min = 1, $max = 50),
        'step1' => $faker->numberBetween($min = 1, $max = 50),
        'step2' => $faker->numberBetween($min = 1, $max = 50),
        'step3' => $faker->numberBetween($min = 1, $max = 50),

        'status' => 0,
        'athlete_id' => Athlete::inRandomOrder()->first()->id,
        'team_id' => Team::inRandomOrder()->first()->id,
        'sport_id' => Sport::inRandomOrder()->first()->id,

    ];
});


//#fattoamano
$factory->define(App\Models\AthleteSport::class, function (Faker $faker) {
    
    return [
        'athlete_id' => Athlete::inRandomOrder()->first()->id,
        'sport_id' => Sport::inRandomOrder()->first()->id

    ];
});


//#fattoamano
$factory->define(App\Models\AthleteTeam::class, function (Faker $faker) {
    
    return [
        'athlete_id' => Athlete::inRandomOrder()->first()->id,
        'team_id' => Team::inRandomOrder()->first()->id

    ];
});

