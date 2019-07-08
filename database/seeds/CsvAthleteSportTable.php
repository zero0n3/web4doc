<?php

use App\User; //#fattoamano
use Illuminate\Database\Seeder;
use JeroenZwart\CsvSeeder\CsvSeeder;

class CsvAthleteSportTable extends CsvSeeder {

    public function __construct()
    {
        $this->tablename = 'athlete_sport2s';
        $this->delimiter = ',';
        $this->file = '\database\seeds\csvs\athlete_sport.csv';
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