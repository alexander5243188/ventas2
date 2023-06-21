<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'quantity',
        'product_id',
        'producto',
        'sale_id',
        'usuario_id',
        'totalpagado'   
    ];

}
