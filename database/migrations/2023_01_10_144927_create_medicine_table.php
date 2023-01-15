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
            $table->string('med_name', 110);
            $table->unsignedBigInteger('med_cat_id');
            $table->integer('med_purchase_price');
            $table->integer('med_quantity');
            $table->string('med_generic_name', 110);
            $table->string('med_scientific_name', 110);
            $table->date('med_expire_date');
            $table->timestamps();
            $table->foreign('med_cat_id')
                ->references('med_cat_id')->on('medicine_categories')
                ->onDelete('cascade');
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
