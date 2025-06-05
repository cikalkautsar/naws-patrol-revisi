<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Education extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'education';
    
    protected $fillable = [
        'title',
        'slug',
        'content',
        'thumbnail',
        'category',
        'reading_time',
        'is_published'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'reading_time' => 'integer'
    ];

    // Generate slug from title
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = \Str::slug($value);
    }

    // Get URL thumbnail dengan path lengkap
    public function getThumbnailUrlAttribute()
    {
        if ($this->thumbnail) {
            return asset('storage/' . $this->thumbnail);
        }
        return asset('images/default-education.jpg');
    }

    // Scope untuk artikel yang dipublish
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    // Scope untuk filter berdasarkan kategori
    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
