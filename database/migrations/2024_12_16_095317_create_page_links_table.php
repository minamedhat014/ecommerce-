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
        Schema::create('page_links', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); 
            $table->foreignId('type_id')->constrained('page_types')->onDelete('cascade')->onDelete('cascade');
            $table->foreignId('parent_id')->nullable()->constrained('page_links')->onDelete('cascade');
            $table->string('title_en');       
            $table->string('title_ar'); 
            $table->string('status')->default('not_ready');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_links');
    }
};
