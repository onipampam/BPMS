<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    //

    public function Journal_Info(){

        return $this->belongsToMany('App\Journal_Info');
    }
}
