<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('saleId')->unsigned();
            $table->bigInteger('productId')->unsigned();
            $table->integer('quantity');
            $table->decimal('price');
            $table->timestamps();
        });

        Schema::table('sale_details', function (Blueprint $table){
            $table->foreign('saleId')->references('id')->on('sales');
        });

        Schema::table('sale_details', function (Blueprint $table){
            $table->foreign('productId')->references('id')->on('sales');
        });
    }
        
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_details');
    }
}
