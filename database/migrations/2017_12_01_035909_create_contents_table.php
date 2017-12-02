<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('row1')->nullable();
            $table->string('row2')->nullable();
            $table->string('row3')->nullable();
            $table->string('row4')->nullable();
            $table->string('row5')->nullable();
            $table->string('row6')->nullable();
            $table->string('row7')->nullable();
            $table->string('row8')->nullable();
            $table->string('row9')->nullable();
            $table->string('row10')->nullable();
            $table->string('row11')->nullable();
            $table->string('row12')->nullable();
            $table->string('row13')->nullable();
            $table->string('row14')->nullable();
            $table->string('row15')->nullable();
            $table->string('row16')->nullable();
            $table->string('row17')->nullable();
            $table->string('row18')->nullable();
            $table->string('row19')->nullable();
            $table->string('row20')->nullable();
            $table->string('row21')->nullable();
            $table->string('row22')->nullable();
            $table->string('row23')->nullable();
            $table->string('row24')->nullable();
            $table->string('row25')->nullable();
            $table->string('row26')->nullable();
            $table->string('row27')->nullable();
            $table->string('row28')->nullable();
            $table->string('row29')->nullable();
            $table->string('row30')->nullable();
            $table->string('row31')->nullable();
            $table->string('row32')->nullable();
            $table->string('row33')->nullable();
            $table->string('row34')->nullable();
            $table->string('row35')->nullable();
            $table->string('row36')->nullable();
            $table->string('row37')->nullable();
            $table->string('row38')->nullable();
            $table->string('row39')->nullable();
            $table->string('row40')->nullable();
            $table->string('row41')->nullable();
            $table->string('row42')->nullable();
            $table->string('row43')->nullable();    
            $table->string('row44')->nullable();
            $table->string('row45')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
