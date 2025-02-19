<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;
    public function user(): HasOne
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function product(): HasOne
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
}
