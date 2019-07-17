<?php

//#fattoamano
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Laravel\Scout\Searchable;
//use Spatie\Searchable\Searchable;
//use Spatie\Searchable\SearchResult;
use App\Models\Athlete;
use App\Models\AthleteSport;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Sport extends Model //implements Searchable
{

    //use Searchable;

	//nel caso i nomi non coincidessero
	protected $table = 'sport2s';
	protected $primaryKey = 'id';
	protected $fillable = [
		'name',
		'status'
	];

    //fiverr
    public function __construct($value = null, array $attributes = array()){
        $this->value = $value;
        parent::__construct($attributes);
    }

    public function athletes(){
        return $this->belongsToMany(Athlete::class)
        ->withPivot('company_id');
    }


     public function newPivot(Model $parent, array $attributes, $table, $exists,$using = null) {
         if ($parent instanceof Athlete) {
             return new AthleteSport($parent, $attributes, $table, $exists,"");
         }
         return parent::newPivot($parent, $attributes, $table, $exists,"");
     }
    //fiverr






/*
    public function athletes()
    {
        return $this->belongsToMany(Athlete::class, 'athlete_sport2s');//->withPivot('company_id');
    }

*/

    /*
    public function relations() {
       return $this->hasMany(AthleteSportCompany::class);
    }*/
    

    /*
    public function athletecompany()
    {
        return $this->hasMany(AthleteCompany::class);
    }
*/
	//join
    
/*
     public function getSearchResult(): SearchResult
     {
        $url = route('search', $this->slug);
     
         return new \Spatie\Searchable\SearchResult(
            $this,
            $this->name,
            $url
         );


     }*/
    
}