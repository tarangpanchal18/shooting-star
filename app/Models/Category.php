<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Defines the relationship between Categories and Exhibtion
     *
     */
    public function exhibition() {
        return $this->hasMany(Exhibition::class);
    }
}
