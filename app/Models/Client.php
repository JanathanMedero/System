<?php

namespace App\Models;

use App\Models\SaleOrder;
use App\Models\ServiceOrder;
use App\Models\ServiceOrderSite;
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

    public function serviceOrder()
    {
        return $this->hasMany(ServiceOrder::class);
    }

    public function serviceSite()
    {
        return $this->hasMany(ServiceOrderSite::class);
    }
}
