<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagTrainingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_training', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('training_id')->unsigned()->default(1);
            $table->foreign('training_id')->references('id')->on('trainings');
            $table->integer('tag_id')->unsigned()->default(1);
            $table->foreign('tag_id')->references('id')->on('tags');
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
        Schema::dropIfExists('tag_training');
    }
}
