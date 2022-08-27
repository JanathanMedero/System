<?php

namespace App\Imports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\ToModel;

class ClientsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Client([
            'name'      => $row[1],
            'slug'      => $row[2],
            'rfc'       => $row[3],
            'phone'     => $row[4],
            'number'    => $row[5],
            'suburb'    => $row[6],
            'cp'        => $row[7],
        ]);
    }
}
