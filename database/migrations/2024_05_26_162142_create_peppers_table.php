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
        Schema::create('peppers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40);
            $table->string('description', 255)->nullable();
            $table->decimal('price', 8, 2);
            $table->string('img', 60);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peppers');
    }
};
