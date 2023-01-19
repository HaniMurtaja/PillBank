<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_guides', function (Blueprint $table) {
            $table->id();
            $table->integer('guide_id')->unsigned(); 
            $table->string('guide_name');
            $table->string('guide_category');
            $table->string('guide_phone');
            $table->string('guide_image');
            $table->string('guide_working_hours');
            $table->double('guide_status');
            $table->string('guide_address');
            $table->string("latitude");
            $table->string("longitude");
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
        Schema::dropIfExists('medical_guides');
    }
};
