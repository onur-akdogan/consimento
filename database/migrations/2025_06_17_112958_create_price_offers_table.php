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
        Schema::create('price_offers', function (Blueprint $table) {
            $table->id();
            
            // Teklifi isteyen kullanıcıyı ilişkilendirelim.
            // users tablosuna bir foreign key oluşturur.
            // onDelete('cascade') ile kullanıcı silinirse, teklifleri de silinir.
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Tüm formlar için ortak ve önemli bir alan.
            $table->string('offer_type'); // Örn: "Kargo ve Paket Taşımacılığı"

            // Teklifin durumunu takip etmek için (Örn: 'beklemede', 'cevaplandı', 'iptal')
            $table->string('status')->default('beklemede');

            // Her forma özel tüm diğer alanları esnek bir şekilde burada saklayacağız.
            $table->json('details');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price_offers');
    }
};