<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    const PATH = 'webadmin';

    protected $fillable = [
        'title' => 'required',
        'description' => 'required',
        'seo_description' => 'required',
        'seo_keywords' => 'required',
        'page_image' => 'image',
        'status' => 'required',
    ];
}
