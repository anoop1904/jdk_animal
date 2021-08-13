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
            $table->string('en_name');
            $table->string('tg_name');
            $table->string('en_product_category')->nullable();   
            $table->string('tg_product_category')->nullable();   
            $table->string('en_product_sub_category')->nullable();   
            $table->string('tg_product_sub_category')->nullable();   
            $table->string('en_product_feed')->nullable();   
            $table->string('tg_product_feed')->nullable();   
            $table->string('en_product_breed')->nullable();        
            $table->string('tg_product_breed')->nullable();        
            $table->string('en_product_about')->nullable();
            $table->string('tg_product_about')->nullable();
            $table->string('product_distance')->nullable();
            $table->float('product_amount', 8, 2)->nullable();          
            $table->enum('pregnancy', ['yes', 'no'])->nullable();  
            $table->string('product_color')->nullable();
            $table->string('product_age')->nullable();
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
