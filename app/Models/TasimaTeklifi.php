<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TasimaTeklifi extends Model
{
    protected $table = 'tasima_teklifleri';

    protected $fillable = [
        'ulke',
        'min_kg',
        'max_kg',
        'tasiyici',
        'hizmet_tipi',
        'tahmini_varis',
        'fiyat'
    ];
}
