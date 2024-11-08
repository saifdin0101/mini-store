<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $fillable = [
        "name",
        "price",
        "image",
        "user_id"
    ];
    public function user () {
        return $this->belongsTo(User::class);
    }
    public function users () {
        return $this->belongsToMany(User::class , 'user_products');
    }
}
