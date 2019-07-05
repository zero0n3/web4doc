<?php

use App\Models\Team; //#fattoamano
use Illuminate\Database\Seeder;

class SeedTeamTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory(App\Models\Team::class, 10)->create();
    }
}
