<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 70);
            $table->string('descripcion', 255)->nullable();
            $table->integer('metros')->nullable();
            $table->boolean('activo')->default(1);
            $table->double('precio')->nullable();
            $table->string('image');
            $table->string('contacto', 70);
            $table->integer('category_id')->unsigned();
            $table->timestamps();


            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publications');
    }
}
