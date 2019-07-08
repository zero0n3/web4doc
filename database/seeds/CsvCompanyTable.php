<?php

use App\User; //#fattoamano
use Illuminate\Database\Seeder;
use JeroenZwart\CsvSeeder\CsvSeeder;

class CsvCompanyTable extends CsvSeeder {

    public function __construct()
    {
        $this->tablename = 'company2s';
        $this->delimiter = ',';
        $this->file = '\database\seeds\csvs\company.csv';
        //dd($this->filename);
    }

    public function run()
    {
        // Recommended when importing larger CSVs
        DB::disableQueryLog();

        // Uncomment the below to wipe the table clean before populating
        DB::table($this->tablename)->truncate();
        
        parent::run();
    }
}