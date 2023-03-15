<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wholesaler extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'addres',
        'nit',
        'email',
        'description',
        'department_id'
    ];
    public function department(){return $this->belongsTo(Department::class);}
   // public function products(){return $this->hasMany(Product::class);}
    public function almacen(){return $this->hasMany(Almacen::class);}
    public function ingresos(){return $this->hasMany(Ingresos::class);}
}
