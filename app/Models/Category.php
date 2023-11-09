<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'menu_id' // Gewijzigd naar 'menu_id' om naar het bijbehorende menu te verwijzen
    ];

    public function menu() {
        return $this->belongsTo(Menu::class);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }

    const STATUS_AVAILABLE = 'AVAILABLE';
    const STATUS_OUT_OF_ORDER = 'OUT_OF_ORDER';
}
