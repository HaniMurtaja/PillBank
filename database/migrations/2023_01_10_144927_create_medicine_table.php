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
        Schema::create('medicine', function (Blueprint $table) {
            $table->bigIncrements('med_id');
            $table->unsignedBigInteger('med_cat_id');
            $table->integer('med_quantity');
            $table->string('med_generic_name', 110);
            $table->string('med_scientific_name', 110);
            $table->date('med_expire_date');
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
        Schema::dropIfExists('medicine');
    }
};
