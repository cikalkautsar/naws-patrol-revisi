<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdoptForm extends Model
{
    protected $table = 'adopt_forms';
    protected $fillable = [
    'user_id',
    'adopt_id',
    'full_name',
    'age',
    'address',
    'house_type',
    'daily_activity',
    'reason',
    'status',
    ];
    public function animal()
    {
        return $this->belongsTo(Adopt::class, 'adopt_id');
    }
}
