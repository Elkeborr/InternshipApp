<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('internships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('internship_function')->nullable();
            $table->text('internship_discription')->nullable();
            $table->text('internship_profile');
            $table->string('education_level');
            $table->text('languages')->nullable();
            $table->text('tags')->nullable();
            $table->boolean('drivers_license');
            $table->integer('available_spots');
            $table->text('remarks');
            $table->boolean('paid');
            $table->boolean('status');
            $table->bigInteger('company_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('internships');
    }
}
