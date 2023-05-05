<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyparentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myparents', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password')->unique();


            // father data 


            $table->string('Name_Father');
            $table->string('National_Id_Father');
            $table->string('Phone_Father');
            $table->string('Job_Father');
            $table->bigInteger('Blood_Father_Id')->unsigned();
            $table->string('Address_Father');




            // Mother data 


            $table->string('Name_Mother');
            $table->string('National_Id_Mother');
            $table->string('Phone_Mother');
            $table->string('Job_Mother');
            $table->bigInteger('Blood_Mother_Id')->unsigned();
            $table->string('Address_Mother');


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
        Schema::dropIfExists('myparents');
    }
}
