<?php

// app/Models/Company.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'brand_name',
        'tax_number',
        'establishment_year',
        'website',
        'contact_person',
        'email',
        'phone',
        'address',
        'service_types',
        'shipping_capacity',
        'accepted_product_types',
        'uk_regions',
        'has_uk_partner',
        'partner_company_name',
        'provides_customs_service',
        'certificates',
        'certificate_files',
        'additional_info',
    ];

    protected $casts = [
        'service_types' => 'array',
        'certificate_files' => 'array',
        'has_uk_partner' => 'boolean',
        'provides_customs_service' => 'boolean',
        'establishment_year' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Hizmet tiplerini human readable formatta döndür
     */
    public function getServiceTypesTextAttribute()
    {
        if (!$this->service_types) {
            return null;
        }

        $serviceMap = [
            'kara' => 'Kara',
            'hava' => 'Hava',
            'deniz' => 'Deniz',
            'parsiyel' => 'Parsiyel'
        ];

        return collect($this->service_types)
            ->map(fn($type) => $serviceMap[$type] ?? $type)
            ->join(', ');
    }

    /**
     * İngiltere partner durumunu text olarak döndür
     */
    public function getUkPartnerStatusTextAttribute()
    {
        if ($this->has_uk_partner === null) {
            return 'Belirtilmemiş';
        }

        return $this->has_uk_partner ? 'Var' : 'Yok';
    }

    /**
     * Gümrük müşavirliği hizmet durumunu text olarak döndür
     */
    public function getCustomsServiceStatusTextAttribute()
    {
        if ($this->provides_customs_service === null) {
            return 'Belirtilmemiş';
        }

        return $this->provides_customs_service ? 'Sunuyor' : 'Sunmuyor';
    }

    /**
     * Sertifika dosyalarının tam URL'lerini döndür
     */
    public function getCertificateFileUrlsAttribute()
    {
        if (!$this->certificate_files) {
            return [];
        }

        return collect($this->certificate_files)
            ->map(fn($path) => asset('storage/' . $path))
            ->toArray();
    }

    /**
     * Sertifika dosyalarının dosya adlarını döndür
     */
    public function getCertificateFileNamesAttribute()
    {
        if (!$this->certificate_files) {
            return [];
        }

        return collect($this->certificate_files)
            ->map(fn($path) => basename($path))
            ->toArray();
    }

    /**
     * Firma kurulalı kaç yıl olduğunu hesapla
     */
    public function getAgeAttribute()
    {
        if (!$this->establishment_year) {
            return null;
        }

        return now()->year - $this->establishment_year;
    }

    /**
     * Website URL'sini düzgün formatta döndür
     */
    public function getFormattedWebsiteAttribute()
    {
        if (!$this->website) {
            return null;
        }

        // Eğer http:// veya https:// ile başlamıyorsa ekle
        if (!preg_match('/^https?:\/\//', $this->website)) {
            return 'https://' . $this->website;
        }

        return $this->website;
    }

    /**
     * Firmanın tam adını döndür (marka adı varsa parantez içinde)
     */
    public function getFullNameAttribute()
    {
        if ($this->brand_name) {
            return $this->name . ' (' . $this->brand_name . ')';
        }

        return $this->name;
    }

    /**
     * Scope: Belirli hizmet tipine sahip firmaları getir
     */
    public function scopeWithServiceType($query, $serviceType)
    {
        return $query->whereJsonContains('service_types', $serviceType);
    }

    /**
     * Scope: İngiltere partneri olan firmaları getir
     */
    public function scopeWithUkPartner($query)
    {
        return $query->where('has_uk_partner', true);
    }

    /**
     * Scope: Gümrük müşavirliği hizmeti sunan firmaları getir
     */
    public function scopeWithCustomsService($query)
    {
        return $query->where('provides_customs_service', true);
    }

    /**
     * Scope: Belirli bir yıldan sonra kurulan firmaları getir
     */
    public function scopeEstablishedAfter($query, $year)
    {
        return $query->where('establishment_year', '>', $year);
    }
}