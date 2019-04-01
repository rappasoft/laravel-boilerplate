<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSocialAccountsTable.
 */
class CreateSocialAccountsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('social_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->string('provider', 32);
            $table->string('provider_id');
            $table->text('token')->nullable(); // Text because Facebook tokens can be greater than 255 characters
            $table->string('avatar')->nullable();
            $table->timestamps();
        });

        Schema::table('social_accounts', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('social_accounts');
    }
}
