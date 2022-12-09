<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id', 'item_id', 'quantity'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
