<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->decimal('total',10,2);
            $table->integer('items');
            $table->decimal('cash',10,2);
            $table->decimal('change',10,2);
            //$table->enum('status',['PAID','PENDING','CANCELLED'])->default('PAID');
            $table->enum('status',['PAGADO','PENDIENTE','CANCELADO'])->default('PAGADO');
            //$table->foreignId('estado_venta_id')->constrained();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('nombrecliente', 200)->nullable();
            $table->string('cedulacliente',200)->nullable();
            $table->string('nombrevendedor',200)->nullable();

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
        Schema::dropIfExists('sales');
    }
}
