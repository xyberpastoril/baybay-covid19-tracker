<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActiveCasesLogTable extends Migration {

	public function up()
	{
		Schema::create('active_cases_log', function(Blueprint $table) {
			$table->timestamps();
			$table->date('date_issued');
			$table->smallInteger('confirmed');
			$table->smallInteger('probable');
			$table->smallInteger('suspected');
			$table->longText('reference')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('active_cases_log');
	}
}