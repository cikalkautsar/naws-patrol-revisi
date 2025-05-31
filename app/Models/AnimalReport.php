<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reporter_name',
        'phone_number',
        'address',
        'report_reason',
        'image',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
} 