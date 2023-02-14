<?php

namespace App\Imports;

use DB;
use App\Models\Sales;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SalesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $sales= new Sales([
            "p_name"=>$row['p_name'],
            "month"=>$row['month'],
            "year"=>$row['year'],
            "total"=>$row['total'],
            "quantity"=>$row['quantity'],
            "s_status"=>$row['s_status'],
        ]);

        DB::table('sales')->where('p_name',$sales->p_name)->delete();

        //$product->assignRole($product->id);
        return $sales;
    }
}
