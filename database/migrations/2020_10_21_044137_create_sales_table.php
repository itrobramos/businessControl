<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('companyId')->unsigned();
            $table->bigInteger('clientID')->unsigned();
            $table->date('date');
            $table->decimal('total');
            $table->timestamps();
        });

        Schema::table('sales', function (Blueprint $table){
            $table->foreign('companyId')->references('id')->on('companies');
        });
        
        Schema::table('sales', function (Blueprint $table){
            $table->foreign('clientID')->references('id')->on('clients');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
