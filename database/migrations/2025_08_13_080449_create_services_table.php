<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('services', function (Blueprint $table) {
			$table->id();
			$table->json('title')->nullable();
			$table->json('slug')->nullable();
			$table->json('subtitle')->nullable();
			$table->json('intro')->nullable();
			$table->json('text_1')->nullable();
			$table->json('text_2')->nullable();

			$table->integer('order_column')->nullable();

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('services');
	}
};
