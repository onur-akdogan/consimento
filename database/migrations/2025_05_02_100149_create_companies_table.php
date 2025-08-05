<?php

// database/migrations/xxxx_xx_xx_create_companies_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // ilişkili kullanıcı
            
            // Temel Firma Bilgileri
            $table->string('name');
            $table->string('brand_name')->nullable();
            $table->string('tax_number')->nullable();
            $table->year('establishment_year')->nullable();
            $table->string('website')->nullable();
            
            // İletişim Bilgileri
            $table->string('contact_person')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            
            // Hizmet Bilgileri
            $table->json('service_types')->nullable(); // Kara, Hava, Deniz, Parsiyel
            $table->string('shipping_capacity')->nullable();
            $table->text('accepted_product_types')->nullable();
            $table->text('uk_regions')->nullable();
            
            // Partner Bilgileri
            $table->boolean('has_uk_partner')->nullable();
            $table->string('partner_company_name')->nullable();
            
            // Hizmet ve Sertifikalar
            $table->boolean('provides_customs_service')->nullable();
            $table->text('certificates')->nullable();
            $table->json('certificate_files')->nullable(); // Dosya yolları
            
            // Ek Bilgiler
            $table->text('additional_info')->nullable();
            
            $table->timestamps();

            // Foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            // Indexes
            $table->index('user_id');
            $table->index('name');
            $table->index('tax_number');
        });
    }

    public function down()
    {
        Schema::dropIfExists('companies');
    }
}