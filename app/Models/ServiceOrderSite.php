<?php

namespace App\Models;

use App\Models\Client;
use App\Models\ServicesOnSites;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrderSite extends Model
{
    use HasFactory;

    protected $fillable = ['employe_id', 'client_id', 'office_id', 'date_of_service', 'observations', 'advance'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function services()
    {
        return $this->hasMany(ServicesOnSites::class, 'order_service_id');
    }
}
