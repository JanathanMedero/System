<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'brand', 'description', 'public_price', 'dealer_price', 'stock_matriz', 'stock_virrey', 'stock_total', 'investment', 'gain_public', 'dealer_profit', 'key_sat', 'description_sat'];

    public function category()
    {
        return $this->hasOne();
    }
}
