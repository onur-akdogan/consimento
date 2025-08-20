<!-- Ticari Eşya Formu -->
<div class="form-section hidden" id="ticari-form">
    <div class="space-y-8">
        <!-- Firma Bilgileri -->
        @include('quote.form-sections.ticari.company-info')
        
        <!-- Güzergah -->
        @include('quote.form-sections.ticari.route-info')
        
        <!-- Gümrük Bilgileri -->
        @include('quote.form-sections.ticari.customs-info')
        
        <!-- Eşya Bilgileri -->
        @include('quote.form-sections.ticari.goods-info')
        
        <!-- Değer ve Diğer Bilgiler -->
        @include('quote.form-sections.ticari.value-other-info')
    </div>
</div>