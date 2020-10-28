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
			$table->text('description');
			$table->foreign('List_id')->references('id')->on('Lists');
			$table->timestampsTz()->useCurrent();
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