<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->foreignId('category_id');   
            $table->foreignId('sub_category_id');   
            $table->foreignId('images_id');   
            $table->float('price', 8, 2);       
            $table->string('color');        
            $table->string('gender');
            $table->string('age');
            $table->enum('pregnancy', ['yes', 'no']);
            $table->string('feed');
            $table->text('breed');
            $table->text('about');         
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
