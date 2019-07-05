<?php

use App\Models\AthleteTeam; //#fattoamano
use Illuminate\Database\Seeder;

class SeedAthleteTeamTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\AthleteTeam::class, 10)->create();
    }
}


