<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 355);
            $table->string('barcode', 250)->nullable();
            $table->string('nircode', 250)->nullable();
            $table->decimal('cost', 10,2)->default(0);
            $table->decimal('price', 10,2)->default(0);
            $table->string('stock');
            //$table->integer('alerts');
            $table->foreignId('alert_id')->constrained();
            $table->string('image', 100)->nullable();
            $table->foreignId('brand_id')->constrained();
            $table->foreignId('countrie_id')->constrained();
            $table->foreignId('category_id')->constrained();
            //$table->foreignId('companie_id')->constrained();
            //$table->foreignId('wholesaler_id')->constrained();
            $table->foreignId('proveedor_id')->constrained();
            //$table->foreignId('iva_id')->constrained();
            //
            $table->foreignId('shelf_id')->constrained();
            $table->foreignId('level_id')->constrained();
            $table->foreignId('user_id')->constrained();
            //$table->enum('type',['FACTURA','RECIBO','OTRO'])->default('FACTURA');
            //$table->string('serie_comprobante', 250)->nullable();
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
        Schema::dropIfExists('products');
    }
}
