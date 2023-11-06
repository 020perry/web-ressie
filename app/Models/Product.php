<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category_id',
        'status'
    ];

//    protected $hidden = [
//        'image', // Verberg het 'image'-veld bij conversie naar array of JSON
//    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function menu() {
        return $this->category->menu;
    }

    const STATUS_AVAILABLE = 'available';
    const STATUS_OUT_OF_ORDER = 'out_of_order';
}
