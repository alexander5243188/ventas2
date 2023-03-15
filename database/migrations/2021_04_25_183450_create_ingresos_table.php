<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wholesaler_id')->constrained();
            $table->foreignId('vaucher_id')->constrained();
            $table->string('seriecomprobante', 200);
            $table->string('numerocomprobante', 200);
            $table->foreignId('product_id')->constrained();            
            $table->string('preciocompra', 200);
            $table->string('cantidad', 200);

            $table->foreignId('user_id')->constrained();
            
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
        Schema::dropIfExists('ingresos');
    }
}
