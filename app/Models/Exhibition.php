<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exhibition extends Model
{
    use HasFactory, SoftDeletes;

    const UPLOAD_PATH = 'images/exhibition/';

    protected $fillable = [
        'title',
        'category_id',
        'short_description',
        'description',
        'start_date',
        'end_date',
        'status',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function images() {
        return $this->hasMany(ExhibitionImage::class);
    }
}
