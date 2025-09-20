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
        Schema::create('rooms', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('holding_id')->constrained();
            $table->foreignUuid('company_id')->constrained();
            $table->foreignUuid('building_id')->constrained();
            $table->foreignUuid('flat_id')->nullable()->constrained();
            $table->string('name')->default('room 1');
            $table->integer('room_number')->default(1);
            $table->decimal('area', 5, 3)->default(6);
            $table->integer('windows')->default(1);
            $table->foreignUuid('user_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
