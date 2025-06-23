<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceOffer extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'details' => 'array', // Bu satır, 'details' JSON sütununu otomatik olarak diziye çevirir.
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'offer_type',
        'status',
        'details',
    ];

    /**
     * Get the user that owns the price offer.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}