<?php

use App\Models\Athlete; //#fattoamano
use Illuminate\Database\Seeder;

class SeedAthleteTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Models\Athlete::class, 10)->create();
    }
}
