<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image'
    ];
    public function brands(){return $this->hasMany(Brand::class);}
    public function products(){return $this->hasMany(Product::class);}
    public function almacen(){return $this->hasMany(almacen::class);}
    public function getImagenAttribute()
	{	
		if($this->image != null)
			return (file_exists('storage/countries/' . $this->image) ? $this->image : 'noimg.jpg');
		else
			return 'noimg.jpg';		
		
	}
}
