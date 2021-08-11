<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignacionTrabajador extends Model
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
    
    protected $fillable = ['asignacion_id',
                        'user_id',
                        'role',
                        'trabajador'
                    ];

    public function user()
    {
        return $this->hasOne(User::class,'id', 'user_id');
    }

    public function asignacion()
    {
        return $this->hasOne(asignacion::class,'id', 'asignacion_id');
    }
}
