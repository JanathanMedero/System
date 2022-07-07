<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $fillable = ['employe_id', 'client_id', 'office_id', 'advance', 'pay', 'status'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
