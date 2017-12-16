<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class companies extends Model
{
    //

    public function investments(){
        return $this->hasMany(investments::class,'company_id','id');
    }
}
