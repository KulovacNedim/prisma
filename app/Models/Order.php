<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'billing_email', 'billing_name', 'billing_address', 'billing_postalCode', 'billing_city', 'billing_total'];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Products')->withPivot('quantity');
    }
}
