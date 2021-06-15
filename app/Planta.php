<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planta extends Model
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
    
    protected $fillable = [ 'codigo',
                            'nombre',
                            'ciudad',
                            'ubicacion',
                            'descripcion',
                        ];
}
