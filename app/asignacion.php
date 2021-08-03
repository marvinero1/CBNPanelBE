<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asignacion extends Model
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
    
    protected $fillable = ['planta_id',
                        'user_id'];

    public function user()
    {
        return $this->hasOne(User::class,'id', 'user_id');
    }
                    
    public function planta(){
        return $this->hasOne(Planta::class,'id','planta_id');
    }
}
