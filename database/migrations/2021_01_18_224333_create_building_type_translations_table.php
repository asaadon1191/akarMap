<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingTypeTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_type_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('building_type_id')->unsigned();
            $table->string('locale');
            $table->string('name');
            $table->timestamps();

            $table->unique(['building_type_id','locale']);
            $table->foreign('building_type_id')->references('id')->on('building_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('building_type_translations');
    }
}
