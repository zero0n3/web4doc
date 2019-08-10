<?php
//#fattoamano
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AthleteSport;
use App\Models\Team;
use App\Models\Athlete;

class Team extends Model {
//nel caso i nomi non coincidessero
  protected $table = 'teams';
  protected $primaryKey = 'id';
  protected $fillable = [
    'name',
    'status'
  ];


  public function checkups(){
    return $this->hasMany(Checkup::class);
  }

  public function athletes()
  {
      return $this->belongsToMany(Athlete::class, 'checkups');
  }


//fiverr
    
    /*public function __construct($value = null, array $attributes = array()){
        $this->value = $value;
        parent::__construct($attributes);
    }*/
/*
    public function athletesports(){
        return $this->hasMany(AthleteSport::class);
    }*/
//fiverr

/*
    public function athletes()
    {
        return $this->hasManyThrough(
          Athlete::class,
          AthleteSport::class,
          'team_id',
          'user_id',
          'id',
          'id'

        );
    }

*/
/*

  public function athletesports(){
    //return $this->hasMany(AthleteSport::class);
    return $this->belongsToMany(Athlete::class, 'athlete_company2s')->using(AthleteTeam::class);
  }
  */



/*
  public function relations() {
     return $this->hasMany(AthleteSportCompany::class);
  }
*/
  /*public function teams(){
    return $this->hasMany(Team::class);
  }*/


  /*
  public function getSearchResult(): SearchResult
  {
    //$url = route('companies.show', $this->id);
    $url = "www.google.com";

    return new SearchResult(
      $this,
      $this->company_name,
      $url
    );
  }*/

}
