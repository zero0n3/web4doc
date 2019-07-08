<?php

use App\User; //#fattoamano
use Illuminate\Database\Seeder;
use JeroenZwart\CsvSeeder\CsvSeeder;

class SeedCsvCompanyTable extends CsvSeeder {

    public function __construct()
    {
        $this->tablename = 'company2s';
        $this->delimiter = ',';
        $this->filename = base_path().'\database\seeds\csvs\company.csv';
        //dd($this->filename);
    }

    public function run()
    {
        // Recommended when importing larger CSVs
        //DB::disableQueryLog();

        // Uncomment the below to wipe the table clean before populating
        //DB::table($this->table)->truncate();

        parent::run();
    }
}