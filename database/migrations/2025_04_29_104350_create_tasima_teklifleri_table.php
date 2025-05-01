<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tasima_teklifleri', function (Blueprint $table) {
            $table->id();
            $table->string('tasiyici');
            $table->string('hizmet_tipi');
            $table->string('tahmini_varis');
            $table->decimal('fiyat', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasima_teklifleri');
    }
};
