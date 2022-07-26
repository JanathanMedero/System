<?php

namespace App\Models;

use App\Models\SaleOrder;
use App\Models\ServiceOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'rfc', 'phone', 'street', 'number', 'suburb', 'cp'];

    public function saleOrder()
    {
        return $this->hasMany(SaleOrder::class);
    }
}
