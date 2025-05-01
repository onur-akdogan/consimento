<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TasimaTeklifi extends Model
{
    use HasFactory;

    protected $fillable = ['tasiyici', 'hizmet_tipi', 'tahmini_varis', 'fiyat'];
}
