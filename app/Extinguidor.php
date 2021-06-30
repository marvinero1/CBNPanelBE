<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extinguidor extends Model
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
    
    protected $fillable = [ 'nombre',
                            'codigo',
                            'tipo',
                            'peso',
                            'proveedor',
                            'imagen',
                            'area',
                            'ubicacion',
                            'fecha_recarga',
                            'fecha_prox_recarga',

                            'estado',
                            'precinto',
                            'chaveta',
                            'percutado',
                            'acceso',
                            'observaciones',
                        ];
}
