<?php

use App\Models\AthleteSport; //#fattoamano
use Illuminate\Database\Seeder;

class SeedAthleteSportTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Models\AthleteSport::class, 10)->create();
    }
}
