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
        'height' => $faker->randomFloat,
        'weight' => $faker->randomFloat,
        'triceps_R' => $faker->randomFloat,
        'triceps_L' => $faker->randomFloat,
        'chest_R' => $faker->randomFloat,
        'chest_L' => $faker->randomFloat,
        'status' => 0,
        'athlete_id' => Athlete::inRandomOrder()->first()->id,

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

