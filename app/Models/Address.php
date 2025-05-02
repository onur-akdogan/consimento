<?php

// app/Models/Address.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'type', 'name', 'phone', 'city', 'district', 'address'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
