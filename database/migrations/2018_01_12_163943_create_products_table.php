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
          $table->increments('id');
          $table->string('title');
          $table->mediumText('description')->nullable();
          $table->mediumText('models')->nullable();
          $table->integer('price')->nullable();
          $table->integer('code');
          $table->integer('stock');
          $table->integer('subcategory_id')->unsigned()->nullable();
          $table->string('primary_img')->nullable();
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
