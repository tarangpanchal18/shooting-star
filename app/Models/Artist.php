<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_name',
        'artist_title',
        'artist_location',
        'artist_description',
        'artist_cover_image',
        'artist_video_url',
        'status',
    ];

    public function images() {
        return $this->hasMany(ArtistImage::class);
    }
}
