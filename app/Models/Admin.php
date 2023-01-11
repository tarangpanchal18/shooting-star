<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    const ADMIN_PATH = 'webadmin';

    protected $fillable = [
        'name',
        'email',
        'phonecode',
        'phone',
        'password',
        'logo',
        'status',
    ];
}
