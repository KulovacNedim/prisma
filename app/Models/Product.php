<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function presentPrice()
    {
        return $this->price . ' KM';
    }

    public function presentNewPrice()
    {
        return $this->new_price . ' KM';
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
