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
        Schema::create('tb_message', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('id_sender')->constrained('users');
            $table->foreignUuid('id_receiver')->constrained('users');
            $table->text('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_message');
    }
};
