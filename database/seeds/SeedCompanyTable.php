<?php

use App\Models\Company; //#fattoamano
use Illuminate\Database\Seeder;

class SeedCompanyTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        factory(App\Models\Company::class, 10)->create();

        /*
        DB::table('companys')->insert([
        	'company_name' => Str::random(10),
            'company_status' => 0,

        ]);*/
    }
}
