<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('messages', function (Blueprint $table) {
			$table->increments('id');
			$table->string('message');
			$table->unsignedInteger('admin');
			$table->unsignedInteger('student');
			$table->unsignedInteger('replied')->default('0');
			$table->timestamps();
		});
		
		Schema::table('messages', function (Blueprint $table) {
			$table->unsignedInteger('user_id')->after('id');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}
	
	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		Schema::dropIfExists('messages');
	}
}