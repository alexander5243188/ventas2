<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use HasFactory;

	protected $fillable = [
		'name',
        'barcode',
		'nircode',
        'cost',
        'price',
        'stock',
        //'alerts',
		'alert_id',
        'image',
        'brand_id',
		'countrie_id',
        'category_id',
        //'companie_id',
		//'wholesaler_id',
		'proveedor_id',
        //'iva_id',
		'shelf_id',
		'level_id',
		'user_id',
		'type',
		'serie_comprobante'		
	];
	public function almacen(){return $this->belongsTo(Almacen::class);}
	public function alert(){return $this->belongsTo(Alert::class);}
	public function countrie(){return $this->belongsTo(Countrie::class);}
	public function brand(){return $this->belongsTo(Brand::class);} 
	//public function companie() {return $this->belongsTo(Companie::class);}
	//public function wholesaler(){return $this->belongsTo(Wholesaler::class);}
	public function proveedor(){return $this->belongsTo(Proveedor::class);}
    //public function iva()  { return $this->belongsTo(Iva::class);   }
	public function category(){return $this->belongsTo(Category::class);}
	public function shelf(){return $this->belongsTo(Shelf::class);}
	public function level(){return $this->belongsTo(Level::class);}
	public function ventas(){return $this->hasMany(SaleDetail::class);}
	public function ingresos(){return $this->hasMany(Ingresos::class);}
	public function users(){return $this->belongsTo(User::class);}
	public function getImagenAttribute()
	{	
		if($this->image != null)
			return (file_exists('storage/products/' . $this->image) ? $this->image : 'noimg.jpg');
		else
			return 'noimg.jpg';		
		
	}

	public function getPriceAttribute($value)
	{
		//comma por punto
		//return str_replace('.', ',', $value);
		// punto por coma
		return str_replace(',', '.', $value);
	}
	public function setPriceAttribute($value)
	{
        //$this->attributes['price'] = str_replace(',', '.', $value);
		$this->attributes['price'] =str_replace(',', '.', preg_replace( '/,/', '', $value, preg_match_all( '/,/', $value) - 1));

	}


}
