<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{   
    protected $auditTimestamps = true;
    protected $auditStrict = true;
    protected $auditThreshold = 100;

    protected $auditEvents = [
        'created',
        'saved',
        'deleted',
        'restored',
        'updated'
    ];

    protected $fillable = [ 'file',
                            'descripcion',
                            'user_id',
                            'planta_id'
                            ];

    public function planta(){
        return $this->hasOne(Planta::class,'id','planta_id');
    }
    public function user(){
        return $this->hasOne(User::class,'id', 'user_id');
    }
}
