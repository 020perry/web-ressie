<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'address',
        'owner_id'
    ];

    public function owner() {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function categories() {
        return $this->hasMany(Category::class);
    }

    public function products() {
        return $this->hasManyThrough(Product::class, Category::class);
    }
}
