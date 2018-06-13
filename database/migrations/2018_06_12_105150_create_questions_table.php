<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->text('statement');
            $table->tinyInteger('type');
            $table->tinyInteger('is_active');
            $table->integer('correct_option_id')->comment("Correct option id from options table");
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('correct_option_id')->references('id')->on('options');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
