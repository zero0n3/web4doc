<?php


use App\Models\AthleteTeam; //#fattoamano
use App\Models\AthleteSport; //#fattoamano
use App\Models\Checkup; //#fattoamano
use App\Models\Athlete; //#fattoamano
use App\Models\Sport; //#fattoamano
use App\Models\Team; //#fattoamano
use App\Models\Company; //#fattoamano
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
        Sport::truncate();
        Team::truncate();
        Company::truncate();
        User::truncate();
        Athlete::truncate();
        Checkup::truncate();
        AthleteSport::truncate();
        AthleteTeam::truncate();

        // $this->call(UsersTableSeeder::class);
        $this->call(SeedUserTable::class); //#fattoamano
        $this->call(SeedCompanyTable::class); //#fattoamano
        $this->call(SeedTeamTable::class); //#fattoamano
        $this->call(SeedSportTable::class); //#fattoamano
        $this->call(SeedAthleteTable::class); //#fattoamano
        $this->call(SeedCheckupTable::class); //#fattoamano
        $this->call(SeedAthleteSportTable::class); //#fattoamano
        $this->call(SeedAthleteTeamTable::class); //#fattoamano
    }
}
