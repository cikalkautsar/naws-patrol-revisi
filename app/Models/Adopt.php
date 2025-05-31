<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adopt extends Model
{
    protected $table = 'adopt';
    protected $fillable = [
        'animal_name',
        'category',
        'shelter_address',
        'age',
        'gender',
        'description',
        'image',
        'status',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
