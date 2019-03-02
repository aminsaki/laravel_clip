<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('Description');
            $table->text('cover');
            $table->text('videos_url');
            $table->enum('activation',['true','false'])->default('true');
            $table->integer('pviewcount');
            $table->integer('priority')->unique();
            $table->timestamps();
        });

        Schema::table('subcatgroties', function (Blueprint $table) {
            $table->unsignedInteger('subcatgrotie_id');
            $table->foreign('subcatgrotie_id')->references('id')->on('subcatgroties');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
        Schema::dropForeign(['subcatgrotie_id']);

    }
}
