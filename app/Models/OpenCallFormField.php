<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OpenCallFormField extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'open_call_id',
        'field_label',
        'field_name',
        'field_type',
        'field_multi_value',
        'field_description',
        'field_is_required',
        'status',
    ];

    public function form() {
        return $this->belongsTo(OpenCall::class);
    }
}
