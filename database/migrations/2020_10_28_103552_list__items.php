<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ListItems extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('List_items', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->text('description')->nullable($value = true);
			$table->tinyInteger('status')->default(0);
			$table->unsignedBigInteger('List_id');
			$table->foreignId('user_id')->references('id')->on('users');
			$table->foreign('List_id')->references('id')->on('Lists');
			$table->timestampsTz();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('List_items');
	}
}