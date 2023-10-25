<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 *
 * Represents a category in the system which can be associated with a restaurant
 * and can have multiple products.
 *
 * @package App\Models
 */
class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',           // Name of the category
        'description',    // Description of the category
        'restaurant_id'   // Foreign key referencing the associated restaurant
    ];

    /**
     * Relation: A category belongs to a single restaurant.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function restaurant() {
        return $this->belongsTo(Restaurant::class);
    }

    /**
     * Relation: A category can have multiple products.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products() {
        return $this->hasMany(Product::class);
    }

    // Constants representing status of a category
    const STATUS_AVAILABLE = 'available';       // Represents that the category is available
    const STATUS_OUT_OF_ORDER = 'out_of_order';  // Represents that the category is currently not available
}
