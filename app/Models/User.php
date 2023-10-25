<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function restaurants() {
        return $this->hasMany(Restaurant::class, 'owner_id');
    }

}

//Er is een User-model dat een één-op-veel-relatie heeft met Restaurant via het owner_id-veld. Dit betekent dat één gebruiker meerdere restaurants kan bezitten, maar elk restaurant heeft slechts één eigenaar.
//Het Restaurant-model heeft een één-op-veel-relatie met Category. Dit betekent dat een restaurant meerdere categorieën kan hebben, maar elke categorie behoort tot slechts één restaurant.
//Het Category-model heeft een één-op-veel-relatie met Product. Dit betekent dat een categorie meerdere producten kan hebben, maar elk product behoort tot slechts één categorie.
//Er is een gecompliceerde relatie tussen Restaurant en Product via Category (hasManyThrough). Dit suggereert dat een restaurant meerdere producten kan hebben via zijn categorieën, en een product kan tot een restaurant behoren via zijn categorie.
//Er zijn ook enkele directe relaties zoals Product behoort tot Category en Product behoort tot Restaurant.
