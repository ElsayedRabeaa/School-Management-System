<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name');

            $table->bigInteger('blood_id')->unsigned();

            $table->foreign('blood_id')->references('id')->on('bloods')->onDelete('cascade');

            $table->bigInteger('Gender_id')->unsigned();
            
            $table->foreign('Gender_id')->references('id')->on('genders')->onDelete('cascade');
            
            $table->bigInteger('Grade_id')->unsigned();
            
            $table->foreign('Grade_id')->references('id')->on('gades')->onDelete('cascade');

            $table->bigInteger('classroom_id')->unsigned();

            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');


            $table->bigInteger('section_id')->unsigned();

            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');


            $table->bigInteger('parent_id')->unsigned();

            $table->foreign('parent_id')->references('id')->on('myparents')->onDelete('cascade');

            $table->date('birth_Date');
            $table->softDeletes();
            $table->string('academic_year');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
