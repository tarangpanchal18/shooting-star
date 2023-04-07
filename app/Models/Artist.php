<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Artist extends Model
{
    use HasFactory, SoftDeletes;

    const UPLOAD_PATH = 'images/artist/';

    const UPLOAD_COVER_PATH = 'images/artist/cover_images/';

    protected $fillable = [
        'artist_name',
        'artist_title',
        'artist_location',
        'artist_description',
        'artist_cover_image',
        'artist_video_url',
        'status',
    ];

    public function shop(): HasMany
    {
        return $this->hasMany(Shop::class);
    }
}
