<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exhibition extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'category_id',
        'short_description',
        'description',
        'start_date',
        'end_date',
        'status',
    ];

    /**
     * Defines the relationship between Exhibtion and Categories
     *
     */
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
