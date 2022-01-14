<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->string('comune')->nullable();
            $table->string('img')->nullable();
            $table->integer('dimensione')->nullable()->unsigned();
            $table->string('foglio_catastale')->nullable();
            $table->string('mappale_catastale')->nullable();
            $table->string('parcella_catastale')->nullable();
            $table->string('tipo_terreno')->nullable();
            $table->string('tipo_irrigazione')->nullable();
            $table->string('tipo_offerta')->nullable();
            $table->integer('canone')->nullable()->unsigned();
            $table->boolean('disponibilita')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fields');
    }
}
