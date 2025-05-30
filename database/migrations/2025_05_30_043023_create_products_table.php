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
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('sub_category_id')->nullable()->constrained('sub_categories')->cascadeOnDelete();
            $table->foreignId('brand_id')->constrained('brands')->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('feature_image')->nullable();
            $table->float('price');
            $table->integer('discount')->nullable();
            $table->float('discount_price')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description');
            $table->integer('stock');
            $table->integer('view_count')->default(0);
            $table->boolean('is_featured')->default(true);
            $table->boolean('status')->default(true);
            $table->timestamps();
            // index
            $table->index(['slug', 'price']);
            $table->index('category_id');
            $table->index('sub_category_id');
            $table->index('brand_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // drop foreign keys
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['sub_category_id']);
            $table->dropForeign(['brand_id']);
            $table->dropIndex(['slug', 'price']);
        });

        Schema::dropIfExists('products');
    }
};
