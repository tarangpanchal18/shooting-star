<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenCallResponse extends Model
{
    use HasFactory;

    const UPLOAD_ART_DATA_PATH = 'images/opencall_form/';

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

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'art_work_title' => 'array',
        'art_work_size' => 'array',
        'art_work_medium' => 'array',
        'art_work_image' => 'array',
        'other_field' => 'array',
    ];

    public function opencall() {
        return $this->hasOne(OpenCall::class, 'id');
    }
}
