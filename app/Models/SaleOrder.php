<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleOrder extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'employe_id', 'office_id'];

    public function product()
    {
        return $this->hasOne(Product::class, 'sale_id');
    }

    //test
    public function products()
    {
        return $this->hasMany(Product::class, 'sale_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
