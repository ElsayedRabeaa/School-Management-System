<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGadesTable extends Migration {

	public function up()
	{
		Schema::create('gades', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->string('name');
			$table->string('notes');
		});
	}

	public function down()
	{
		Schema::drop('gades');
	}
}