<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWholesalersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wholesalers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('phone', 23);
            $table->string('addres', 300)->nullable();
            $table->string('nit', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('description', 600)->nullable();
            $table->foreignId('department_id')->constrained();
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
        Schema::dropIfExists('wholesalers');
    }
}
