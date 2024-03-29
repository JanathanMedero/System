<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Report;
use App\Models\ServicesOnSites;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrderSite extends Model
{
    use HasFactory;

    protected $fillable = ['folio','employe_id', 'client_id', 'office_id', 'date_of_service', 'observations', 'advance'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function services()
    {
        return $this->hasMany(ServicesOnSites::class, 'order_service_id');
    }

    public function employe()
    {
        return $this->belongsTo(User::class, 'employe_id', 'id');
    }

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }
}
