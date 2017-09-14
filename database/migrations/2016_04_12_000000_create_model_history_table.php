<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelHistoryTable extends Migration
{
    /**
     * This creates the model history table in the database.
     */
    public function up()
    {
        Schema::create('model_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->morphs('context');
            $table->string('link')->nullable();
            $table->string('message');
            $table->text('additional_information')->nullable();
            $table->timestamp('executed_at');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('model_history');
    }
}
