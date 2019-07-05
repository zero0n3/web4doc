<?php

use App\Models\Checkup; //#fattoamano
use Illuminate\Database\Seeder;

class SeedCheckupTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Models\Checkup::class, 50)->create();
    }
}
