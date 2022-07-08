<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesOnSites extends Model
{
    use HasFactory;

    protected $fillable = ['order_service_id', 'name', 'slug', 'quantity', 'net_price', 'description'];
}
