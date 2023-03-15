<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denomination extends Model
{
	use HasFactory;

	protected $fillable = [
		//'type',
		'type_id',
		'value',
		'image'
	];
	public function type(){return $this->belongsTo(Type::class);}
	public function sale(){return $this->hasMany(Sale::class);}
	public function getImagenAttribute()
	{	
		if($this->image != null)
			return (file_exists('storage/denominations/' . $this->image) ? $this->image : 'noimg.jpg');
		else
			return 'noimg.jpg';		
		
	}

	


}
