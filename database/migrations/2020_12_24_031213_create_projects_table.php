<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('space')->unsigned();
            $table->integer('total_units')->unsigned(); 
            $table->text('logo')->nullable();
            $table->text('map_desigen')->nullable();
            $table->integer('admin_id')->unsigned();
            $table->integer('governorate_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->boolean('is_active')->defult(0);
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
        Schema::dropIfExists('projects');
    }
}
