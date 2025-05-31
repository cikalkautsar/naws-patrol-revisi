<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
        public function adopts()
    {
        return $this->hasMany(Adopt::class);
    }
}
