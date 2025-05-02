<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tasima_teklifleri', function (Blueprint $table) {
            $table->id();
            $table->string('ulke');
            $table->decimal('min_kg', 8, 2);
            $table->decimal('max_kg', 8, 2);
            $table->string('tasiyici'); // Örn: UPS, FedEx
            $table->string('hizmet_tipi'); // Express, Ekonomik
            $table->string('tahmini_varis'); // Örn: 3-5 iş günü
            $table->decimal('fiyat', 10, 2); // USD
            $table->timestamps();
            });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasima_teklifleri');
    }
};
