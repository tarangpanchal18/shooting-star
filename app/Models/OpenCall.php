<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OpenCall extends Model
{
    use HasFactory, SoftDeletes;

    const UPLOAD_PATH = 'images/opencall/';

    protected $fillable = [
        'title',
        'short_description',
        'description',
        'cover_image',
        'start_date',
        'end_date',
        'is_show_artwork',
        'status',
    ];

    public function formfield() {
        return $this->hasMany(OpenCallFormField::class);
    }
}
