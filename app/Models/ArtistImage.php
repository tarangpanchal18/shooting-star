<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_id',
        'title',
        'short_description',
        'other_short_description',
        'filename',
        'file_size',
        'filename_md',
        'filename_sm',
        'status',
    ];

    public function artist() {
        return $this->belongsTo(Artist::class);
    }
}
