<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'img',
        'slug',
        'category_id'
    ];


    /**
     * Many products to one category Relationship
     **/
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    /**
     * Many products to many users Relationship
     **/
    public function users()
    {
        return $this->belongsToMany(User::class, 'carts')
        ->withPivot('user_id')
        ->withTimestamps();
    }

}
