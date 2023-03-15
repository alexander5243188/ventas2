<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
            'total',
            'items',
            'cash',
            'change',
            'status',
            'user_id', 
            'nombrecliente',
            'cedulacliente',
            'nombrevendedor'
        ];

    public function user(){return $this->belongsTo(User::class);}
    //public function estadoVenta(){return $this->belongsTo(EstadoVenta::class);}
}
