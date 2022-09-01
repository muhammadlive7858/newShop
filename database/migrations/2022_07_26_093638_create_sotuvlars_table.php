<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSotuvlarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sotuvlars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('productsAndCounts');
            $table->string('savdo');
            $table->string('foyda');
            $table->string('qaytimPuli')->nullable();
            $table->foreignId('clientId')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sotuvlars');
    }
}
