<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id'
        //'country_id'       
    ];
    public function products(){return $this->hasMany(Product::class);}
    public function almacen(){return $this->hasMany(Almacen::class);}
    public function users(){return $this->belongsTo(User::class);}
    //public function country(){return $this->belongsTo(Country::class); }
}
