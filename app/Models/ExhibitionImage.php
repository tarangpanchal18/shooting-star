<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExhibitionImage extends Model
{
    use HasFactory;

    public function exhibition() {
        return $this->belongsTo(Exhibition::class);
    }
}
