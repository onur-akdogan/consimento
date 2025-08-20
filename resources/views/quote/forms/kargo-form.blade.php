<!-- Kargo Formu -->
<div class="form-section hidden" id="kargo-form">
    <div class="space-y-8">
        <!-- Gönderici Bilgileri -->
        @include('quote.form-sections.sender-info', ['formType' => 'kargo'])
        
        <!-- Güzergah Bilgileri -->
        @include('quote.form-sections.route-info', ['formType' => 'kargo'])
        
        <!-- Alıcı Bilgileri -->
        @include('quote.form-sections.receiver-info', ['formType' => 'kargo'])
        
        <!-- Paket Bilgileri -->
        @include('quote.form-sections.package-info', ['formType' => 'kargo'])
    </div>
</div>