<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaucher extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'              
    ];
    public function ingresos(){ return $this->hasMany(Ingresos::class);}
}
