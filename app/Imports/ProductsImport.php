<?php

namespace App\Imports;

use App\Models\Inventory;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Inventory([
            'category_id'       => $row[0],
            'brand'             => $row[1],
            'description'       => $row[2],
            'public_price'      => $row[3],
            'dealer_price'      => $row[4],
            'stock_matriz'      => $row[5],
            'stock_virrey'      => $row[6],
            'stock_total'       => ($row[5] + $row[6]),
            'stock_virrey'      => $row[6],
            'investment'        => $row[7],
            'gain_public'       => $row[8],
            'dealer_profit'     => $row[9],
            'key_sat'           => $row[10],
            'description_sat'   => $row[11],
        ]);
    }
}
