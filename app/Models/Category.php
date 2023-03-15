<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use HasFactory;

	protected $fillable = ['name','user_id','country_id','image'];

	public function products(){return $this->hasMany(Product::class);}
	public function almacen(){return $this->hasMany(Almacen::class);}
	public function users(){return $this->belongsTo(User::class);}

	//Accessor
	public function getImagenAttribute()
	{
	

		if($this->image != null)
			return (file_exists('storage/categories/' . $this->image) ? $this->image : 'noimg.jpg');
		else
			return 'noimg.jpg';	
	
	}

}
