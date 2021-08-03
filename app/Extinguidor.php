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
    
    protected $fillable = [ 
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
                            'condicion',
                            'precinto',
                            'chaveta',
                            'percutado',
                            'presurizado',
                            'acceso',
                            'observaciones',
                            'user',
                            'categorias_id',
                            'planta_id',
                            // 'user_id',
                        ];

    public function categoria(){
        return $this->hasOne(Categoria::class,'id','categorias_id');
    }

    public function planta(){
        return $this->hasOne(Planta::class,'id','planta_id');
    }
}
