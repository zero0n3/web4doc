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
	protected $table = 'sport2s';
	protected $primaryKey = 'id';
	protected $fillable = [
		'name',
		'status'
	];
    
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