<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialFacebookAccountsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('social_facebook_accounts', function (Blueprint $table) {
            $table->uuid('user_id');
            $table->string('provider_user_id');
            $table->string('provider');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('social_facebook_accounts');
    }
}
