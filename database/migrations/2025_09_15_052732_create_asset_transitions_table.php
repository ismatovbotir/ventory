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
        Schema::create('asset_transitions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type')->default('in'); //in,transfer,assign,repair,out
            $table->foreignUuid('holding_id')->constrained();
            $table->foreignUuid('asset_item_id')->constrained();
            $table->foreignUuid('user_id')->constrained();
            $table->foreignUuid('building_id')->nullable()->constrained();
            $table->foreignUuid('flat_id')->nullable()->constrained();
            $table->foreignUuid('room_id')->nullalbe()->constrained();
            $table->uuid('assign_user')->nullable();
            $table->foreign('assign_user')->references('id')->on('users')->cascadeOnDelete();

            $table->text('comment')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_transitions');
    }
};
