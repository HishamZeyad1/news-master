<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('avatar');
            $table->string('DOB');
            $table->string('nationality');
            $table->string('career');
            // $table->bigInteger('category_id')->unsigned();
            $table->timestamps();
            // $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');

            // $table->foreignId('category_id) ->constraint(' table name')->onDelete('cascade');

            $table->foreignId('category_id')->constraint('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authors');
    }
}
