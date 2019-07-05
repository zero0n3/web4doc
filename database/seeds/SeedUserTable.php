<?php

use App\User; //#fattoamano
use Illuminate\Database\Seeder;

class SeedUserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        factory(App\User::class, 20)->create();
    }
}
