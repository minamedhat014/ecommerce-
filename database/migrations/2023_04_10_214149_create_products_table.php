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
            $table->string('name_ar')->index();
            $table->string('name_en')->index();
            $table->string('sku')->unique();
            $table->string('slug')->unique();
            $table->foreignId('category_id')->constrained('product_categories')->cascadeOnUpdate();
            $table->longText('description_en');
            $table->longText('description_ar');
            $table->string('status')->default('not_ready');
            $table->string('remarks')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
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
