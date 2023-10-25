<?php

namespace App\Models;
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

    protected $hidden = [
        // Fields you want to hide when the model is converted to an array or JSON.
        // For instance, if you don't want the image path to be directly visible, you can add it here.
    ];

    // Relations
    public function category() {
        return $this->belongsTo(Category::class);
    }

    // Getting the restaurant through the category
    public function restaurant() {
        return $this->category->restaurant;
    }

    const STATUS_AVAILABLE = 'available';
    const STATUS_OUT_OF_ORDER = 'out_of_order';

}
