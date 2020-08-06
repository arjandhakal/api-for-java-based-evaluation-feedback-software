<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('contactno');
            $table->integer('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('type');
            $table->integer('answerOne');
            $table->integer('answerTwo');
            $table->integer('answerThree');
            $table->integer('answerFour');
            $table->integer('answerFive');
            $table->integer('answerSix');
            $table->integer('answerSeven');
            $table->integer('answerEight');
            $table->integer('answerNine');
            $table->integer('answerTen');
            $table->unique(array('email','product_id','type'));
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
        Schema::dropIfExists('responses');
    }
}
