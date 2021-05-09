<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'pet_id'
    ];


    /**
     * Many categories to one pet Relationship
     */
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    /**
     * One category to many products Relationship
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
