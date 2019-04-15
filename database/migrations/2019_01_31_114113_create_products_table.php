<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->string('ean', 13);
            $table->string('naam', 100);
            $table->string('merk', 100);
            $table->string('foto', 255);
            $table->string('prijs');
            $table->integer('btw_id')->default(1);
            $table->integer('categorie_id');
            $table->integer('subcategorie_id')->nullable();
            $table->integer('gewicht')->default(0);
            $table->integer('aantal')->default(0);
            $table->longText('korteomschrijving');
            $table->longText('omschrijving');
            $table->longText('ingredienten')->nullable();
            $table->longText('allergieinfo')->nullable();
            $table->string('kenmerken', 255);
            $table->longText('gebruik')->nullable();
            $table->longText('bewaren');
            $table->string('oorsprong', 255);
            $table->boolean('alcohol')->default(0);
            $table->integer('voorraadcode')->default(000);
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
        Schema::dropIfExists('products');
    }
}
