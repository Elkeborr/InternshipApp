<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignCompanyTags extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('assign_company_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->uuid('uuid');
            $table->bigInteger('company_id');
            $table->bigInteger('company_tag_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('assign_company_tags');
    }
}
