<?php
//#fattoamano
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Spatie\Searchable\Searchable;
//use Spatie\Searchable\SearchResult;

class Company extends Model {
//nel caso i nomi non coincidessero
  protected $table = 'company2s';
  protected $primaryKey = 'id';
  protected $fillable = [
    'company_name',
    'company_status'
  ];

  public function athletesports(){
    return $this->hasMany(AthleteSport::class);
    //return $this->belongsToMany(Athlete::class, 'athlete_company2s')->using(AthleteTeam::class);
  }
  



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
