<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleOrder extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'employe_id', 'office_id'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
