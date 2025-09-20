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
        Schema::create('assets', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('holding_id')->constrained();
            $table->foreignUuid('category_id')->constrained();
            $table->foreignUuid('product_id')->nullable()->constrained();
            $table->string('name');
            $table->integer('rate')->default(12);
            $table->string('gtin')->nullable();
            $table->string('mark')->nullable();
            $table->foreignUuid('user_id')->constrained();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
