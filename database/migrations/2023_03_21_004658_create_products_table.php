<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('products', function (Blueprint $table) {
			$table->id();
			$table->text('product_name');
			$table->unsignedBigInteger('product_variant')->nullable();
			$table->unsignedBigInteger('product_category')->nullable();
			$table->string('product_specs')->nullable();
			$table->longtext('product_desc')->nullable();
			$table->text('product_short')->nullable();
			$table->string('product_mime')->nullable();
			$table->string('tags')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('products');
	}
};
