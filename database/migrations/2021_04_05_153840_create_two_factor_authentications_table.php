<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTwoFactorAuthenticationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('two_factor_authentications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('authenticatable', '2fa_auth_type_auth_id_index');
            $table->string('shared_secret');
            $table->timestampTz('enabled_at')->nullable();
            $table->string('label');
            $table->unsignedTinyInteger('digits')->default(6);
            $table->unsignedTinyInteger('seconds')->default(30);
            $table->unsignedTinyInteger('window')->default(0);
            $table->string('algorithm', 16)->default('sha1');
            $table->json('recovery_codes')->nullable();
            $table->timestampTz('recovery_codes_generated_at')->nullable();
            $table->json('safe_devices')->nullable();
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('two_factor_authentications');
    }
}
