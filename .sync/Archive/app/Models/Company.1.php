<?php
//#fattoamano
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Spatie\Searchable\Searchable;
//use Spatie\Searchable\SearchResult;

class Company extends Model {
//nel caso i nomi non coincidessero
  protected $table = 'companys';
  protected $primaryKey = 'id';
  protected $fillable = [
    'company_name',
    'company_status'
  ];

  public function athletes(){
    return $this->hasMany(Athlete::class);
  }

  public function teams(){
    return $this->hasMany(Team::class);
  }

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id','id');
	}

  public function getSearchResult(): SearchResult
  {
    //$url = route('companies.show', $this->id);
    $url = "www.google.com";

    return new SearchResult(
      $this,
      $this->company_name,
      $url
    );
  }

}
