<?php

//#fattoamano
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Laravel\Scout\Searchable;
//use Spatie\Searchable\Searchable;
//use Spatie\Searchable\SearchResult;

class Sport extends Model //implements Searchable
{

    //use Searchable;

	//nel caso i nomi non coincidessero
	protected $table = 'sports';
	protected $primaryKey = 'id';
	protected $fillable = [
		'name',
		'status'
	];
    
	//join
    public function athletes()
	{
        //return $this->belongsToMany(Athlete::class, 'athletesports');
        return $this->belongsToMany('App\Models\Athlete', 'athlete_sports');
    }

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