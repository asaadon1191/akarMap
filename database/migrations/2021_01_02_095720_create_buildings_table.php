<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->increments('id');
           
            $table->integer('space')->unsigned();
            $table->integer('total_units')->unsigned();
            $table->integer('price_meter')->unsigned();
            $table->integer('total_price')->unsigned();
            $table->integer('bed_Room_Number')->unsigned();
            $table->integer('bath_Room_Number')->unsigned();
            $table->integer('aviliable_unites')->unsigned()->default(0);
            $table->integer('sold_unites')->default(0)->unsigned();
            $table->integer('project_id')->unsigned();
            $table->integer('building_type_id')->unsigned();
            $table->integer('attribute_id')->unsigned()->nullable();
            $table->boolean('is_active')->default(0);
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
        Schema::dropIfExists('buildings');
    }
}
