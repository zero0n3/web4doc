<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Relations\Pivot;

use App\AthleteSport;

class CustomPivot extends Eloquent
{
    public function newPivot(\Illuminate\Database\Eloquent\Model $parent, array $attributes, $table, $exists){
        return new AthleteSport($parent, $attributes, $table, $exists);
    }
    
}
