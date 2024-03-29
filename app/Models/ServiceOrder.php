<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Report;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $fillable = ['folio','employe_id', 'client_id', 'office_id', 'report_id', 'advance', 'pay', 'status'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function service()
    {
        return $this->hasOne(Service::class, 'service_id');
    }

    public function employe()
    {
        return $this->belongsTo(User::class);
    }

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }
}
