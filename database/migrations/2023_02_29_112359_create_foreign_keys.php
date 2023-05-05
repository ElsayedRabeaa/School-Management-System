<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('Classrooms', function(Blueprint $table) {
			$table->foreign('Grade_id')->references('id')->on('gades')
			->onDelete('cascade');
		});
		Schema::table('sections', function(Blueprint $table) {
			$table->foreign('Grade_id')->references('id')->on('gades')
			->onDelete('cascade');
		});
		Schema::table('myparents', function(Blueprint $table) {
			$table->foreign('Blood_Father_Id')->references('id')->on('bloods')->onDelete('cascade');
			$table->foreign('Blood_Mother_Id')->references('id')->on('bloods')->onDelete('cascade');

		});
		// Schema::table('parent_attachments', function(Blueprint $table) {
		// 	$table->foreign('parent_id')->references('id')->on('myparents')->onDelete('cascade');

		// });
	}

	public function down()
	{
		Schema::table('Classrooms', function(Blueprint $table) {
			$table->dropForeign('Classrooms_Grade_id_foreign');
		});

		Schema::table('sections', function(Blueprint $table) {
			$table->dropForeign('Classrooms_Grade_id_foreign');
		});

		Schema::table('myparents', function(Blueprint $table) {
			$table->dropForeign('Classrooms_Blood_Father_Id_foreign');
		});

		Schema::table('Myparents', function(Blueprint $table) {
			$table->dropForeign('Classrooms_Blood_Mother_Id_foreign');
		});
	



		
	}
}




