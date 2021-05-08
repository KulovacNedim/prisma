<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    use HasFactory;
    use SearchableTrait;

    protected $fillable = ['name', 'slug', 'code', 'imageUrl', 'shortDescription', 'description', 'price', 'quantity', 'isActive', 'is_top_product'];

    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'products.name' => 10,
            'products.shortDescription' => 5,
            'products.description' => 2
        ]
    ];

    public function presentPrice()
    {
        return $this->price . ' KM';
    }

    public function presentNewPrice()
    {
        return number_format($this->price, 2, '.', '') . ' KM';
    }

    public function scopeMightAlsoLike($query)
    {
        return $query->inRandomOrder()->take(4);
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }
}
