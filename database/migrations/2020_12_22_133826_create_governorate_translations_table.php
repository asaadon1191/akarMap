<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGovernorateTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('governorate_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('governorate_id')->unsigned();
            $table->string('locale');
            $table->string('name');
            $table->timestamps();

            $table->unique(['governorate_id','locale']);
            $table->foreign('governorate_id')->references('id')->on('governorates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('governorate_translations');
    }
}
