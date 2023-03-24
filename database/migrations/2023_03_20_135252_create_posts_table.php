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
		Schema::create('posts', function (Blueprint $table) {
			$table->id();
			$table->text('post_title');
			$table->longtext('post_content');
			$table->text('post_exerpt');
			$table->unsignedBigInteger('category_id');
			$table->string('post_status')->nullable();
			$table->string('mime')->nullable();
			$table->string('tags')->nullable();
			$table->timestamps();
			$table->timestamp('published_at');
			$table->SoftDeletes();

			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('posts');
	}
};
