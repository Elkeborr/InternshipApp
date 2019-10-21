<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('bio')->nullable();
            $table->string('phoneNumber');
<<<<<<< HEAD
            $table->string('email');
            $table->string('employees');
=======
            $table->string('email')->unique();
>>>>>>> origin/master
            $table->string('street');
            $table->string('streetNumber');
            $table->string('city');
            $table->string('postalCode');
            $table->string('employees');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
