<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    public function planta(){
        return $this->hasOne(Planta::class,'id','planta_id');
    }
}
