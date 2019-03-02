<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcatgrotiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcatgroties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('images');
            $table->enum('activation',['true','false'])->default('true');
            $table->text('description');
            $table->integer('priority')->unique();
            $table->timestamps();
        });

        Schema::table('catgroties', function (Blueprint $table) {
            $table->unsignedInteger('catgrotie_id');
            $table->foreign('catgrotie_id')->references('id')->on('catgroties');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcatgroties');
    }
}
