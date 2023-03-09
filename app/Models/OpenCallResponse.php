<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenCallResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'open_call_id',
        'name',
        'email',
        'phone',
        'website_link',
        'instagram_link',
        'comment',
        'art_work_title',
        'art_work_size',
        'art_work_medium',
        'art_work_image',
        'other_field',
    ];
}
