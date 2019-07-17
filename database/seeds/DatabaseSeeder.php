<?php


use App\Models\AthleteSport; //#fattoamano
use App\Models\Checkup; //#fattoamano
use App\Models\Athlete; //#fattoamano
use App\Models\Sport; //#fattoamano
use App\Models\Team; //#fattoamano
use App\User; //#fattoamano
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        Sport::truncate();
        Team::truncate();
        AthleteSport::truncate();
        Athlete::truncate();
        Checkup::truncate();
        //AthleteTeam::truncate();

        // $this->call(UsersTableSeeder::class);
        $this->call(SeedUserTable::class); //#fattoamano
        //  $this->call(SeedCompanyTable::class); //#fattoamano
        //  $this->call(SeedTeamTable::class); //#fattoamano
        //  $this->call(SeedSportTable::class); //#fattoamano
        //  $this->call(SeedAthleteTable::class); //#fattoamano
        
        //$this->call(SeedAthleteSportTable::class); //#fattoamano
        //$this->call(SeedAthleteTeamTable::class); //#fattoamano
        $this->call(CsvTeamTable::class); //#fattoamano
        $this->call(CsvAthleteTable::class); //#fattoamano
        $this->call(CsvSportTable::class); //#fattoamano
        //$this->call(CsvAthleteSportTable::class); //#fattoamano
        $this->call(CsvAthleteSportTable::class); //#fattoamano
        //$this->call(CsvAthleteSportCompanyTable::class); //#fattoamano
        $this->call(SeedCheckupTable::class); //#fattoamano
        
    }
}
