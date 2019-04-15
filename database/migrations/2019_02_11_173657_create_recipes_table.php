<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naam');
            $table->string('gang');
            $table->string('soort');
            $table->string('bereidingsmethode');
            $table->longText('ingredienten');
            $table->string('extra');
            $table->string('seizoen');
            $table->integer('personen')->default(1);
            $table->integer('tijd')->default(1);
            $table->boolean('alcohol')->default(0);
            $table->longText('bereiding');
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
        Schema::dropIfExists('recipes');
    }
}
