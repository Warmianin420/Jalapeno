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
            // Usuń kolumny niepotrzebne w nowej wersji
            $table->dropForeign(['pepper_id']);
            $table->dropColumn('pepper_id');
            $table->dropColumn('quantity');
            $table->dropColumn('order_date');

            // Dodaj nowe kolumny do obsługi koszyka
            $table->json('items')->nullable(); // Przechowywanie szczegółów zamówienia
            $table->decimal('total_price', 10, 2)->default(0); // Łączna kwota zamówienia
            $table->timestamps(); // Dodaj znaczniki czasu (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Przywróć stare kolumny
            $table->foreignId('pepper_id')->constrained();
            $table->unsignedInteger('quantity')->default(1);
            $table->dateTime('order_date')->default(now());

            // Usuń nowe kolumny
            $table->dropColumn('items');
            $table->dropColumn('total_price');
            $table->dropTimestamps();
        });
    }
};
