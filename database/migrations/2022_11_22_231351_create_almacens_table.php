<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmacensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almacens', function (Blueprint $table) {
            $table->id();
            $table->date('fecha')->nullable();           
            $table->foreignId('product_id')->constrained();
            $table->foreignId('proveedor_id')->constrained();
            $table->string('stock')->nullable();
            $table->string('stockI')->nullable();
            $table->string('stockS')->nullable();
            $table->string('ingreso')->nullable();  
            $table->string('salida')->nullable();  
            $table->string('producto')->nullable();  
            $table->string('nombrevendedor')->nullable();             
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('almacens');
    }
}
