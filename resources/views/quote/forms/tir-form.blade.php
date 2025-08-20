<!-- TIR Formu -->
<div class="form-section hidden" id="tir-form">
    <div class="space-y-8">
        <!-- Yük Bilgileri -->
        @include('quote.form-sections.tir.cargo-info')
        
        <!-- Yükleme/Boşaltma Şekli -->
        @include('quote.form-sections.tir.loading-unloading-method')
        
        <!-- Yükleme Bilgileri -->
        @include('quote.form-sections.tir.loading-info')
        
        <!-- Boşaltma Bilgileri -->
        @include('quote.form-sections.tir.unloading-info')
        
        <!-- Araç Talebi -->
        @include('quote.form-sections.tir.vehicle-request')
        
        <!-- Ücret ve Fatura Bilgileri -->
        @include('quote.form-sections.tir.payment-invoice-info')
    </div>
</div>