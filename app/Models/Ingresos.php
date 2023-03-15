<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingresos extends Model
{
    use HasFactory;
    protected $fillable = [
        'wholesaler_id',
        'vaucher_id',
        'seriecomprobante',
        'numerocomprobante',
        'product_id',
        'preciocompra',
        'cantidad',
        'user_id'
    ];
    public function wholesaler(){return $this->belongsTo(Wholesaler::class);}
    public function vaucher(){return $this->belongsTo(Vaucher::class);}
    public function product(){return $this->belongsTo(Product::class);}
    public function almacen(){return $this->belongsTo(Almacen::class);}
    public function user(){return $this->belongsTo(User::class);}
}