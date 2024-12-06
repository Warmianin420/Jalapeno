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
        Schema::table('orders', function (Blueprint $table) {
            // Dodaj tylko te kolumny, które jeszcze nie istnieją
            if (!Schema::hasColumn('orders', 'example_column')) {
                $table->string('example_column')->nullable();
            }
            // Nie dodawaj 'items', 'total_price', 'created_at', 'updated_at', jeśli zostały już dodane
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Przywracanie kolumn dodanych w tej migracji
            if (Schema::hasColumn('orders', 'example_column')) {
                $table->dropColumn('example_column');
            }
        });
    }
};
