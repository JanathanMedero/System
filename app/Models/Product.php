<?php

namespace App\Models;

use App\Models\SaleOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['sale_id', 'name', 'slug', 'quantity', 'unit_price', 'net_price', 'description', 'warranty', 'observations'];

    public function saleOrder()
    {
        return $this->belongsTo(SaleOrder::class, 'id');
    }

}
