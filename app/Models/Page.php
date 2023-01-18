<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'seo_description',
        'seo_keywords',
        'page_image',
        'status',
    ];

    /**
     * Format the CreatedAt Date
     *
     * @return date
     */
    public function getCreatedAtAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }

    /**
     * Format the UpdatedAt Date
     *
     * @return date
     */
    public function getUpdatedAtAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }

}
