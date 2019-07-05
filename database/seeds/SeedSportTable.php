<?php

use App\Models\Sport; //#fattoamano
use Illuminate\Database\Seeder;

class SeedSportTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Models\Sport::class, 20)->create();
    }
}
