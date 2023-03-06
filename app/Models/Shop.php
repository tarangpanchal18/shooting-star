<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use HasFactory, SoftDeletes;

    const UPLOAD_PATH = 'images/shop_item/';

    protected $table = "shop_items";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'artist_id',
        'item_title',
        'item_short_description',
        'item_description',
        'item_filename',
        'item_price',
        'status',
    ];

    public function artist() {
        return $this->belongsTo(Artist::class);
    }
}
