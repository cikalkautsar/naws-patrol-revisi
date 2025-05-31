<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'name',
        'email',
        'phone',
        'address',
        'amount',
        'payment_method',
        'status',
        'paid_at',
    ];

    // Kolom yang harus dikonversi ke Carbon
    protected $dates = [
        'paid_at',
        'created_at',
        'updated_at'
    ];

    // Cast tipe data
    protected $casts = [
        'amount' => 'decimal:2',
        'paid_at' => 'datetime',
    ];
}
