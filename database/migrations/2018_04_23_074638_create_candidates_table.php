<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCandidatesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('candidates', function (Blueprint $table) {
			$table->increments('id')->unsigned()->unique();
			$table->string('fname')->nullable();
			$table->string('lname')->nullable();
			$table->string('username')->unique();
			$table->string('email')->unique();
			$table->string('password');
			$table->string('gender')->default('Male');
			$table->date('date_of_birth')->nullable();
			$table->string('country')->nullable();
			$table->string('city')->nullable();
			$table->text('current_location')->nullable();
			$table->text('current_address')->nullable();
			$table->text('permanent_address')->nullable();
			$table->string('nationality')->nullable();
			$table->string('nid_passport')->nullable();
			$table->string('phone')->nullable();
			$table->string('marital_status')->nullable();
			$table->string('father_name')->nullable();
			$table->string('mother_name')->nullable();
			$table->string('spouse_name')->nullable();
			$table->text('about_me')->nullable();
			$table->string('website')->nullable();
			$table->string('linkedin')->nullable();
			$table->boolean('verified')->default(false);
			$table->string('dp')->nullable();
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('candidates');
	}
}
