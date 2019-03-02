<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatgrotiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catgroties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('cover');
            $table->enum('activation',['true','false'])->default('true');
            $table->text('description');
            $table->integer('priority')->unique();
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
        Schema::dropIfExists('catgroties');
    }
}
