<?php

namespace App\Imports;

use DB;
use App\Models\Contact;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContactImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $contact= new Contact([
            "c_owner"=>$row['c_owner'],
            "c_name"=>$row['c_name'],
            "c_phone"=>$row['c_phone'],
            "c_mobile"=>$row['c_mobile'],
            "c_company"=>$row['c_company'],
            "c_email"=>$row['c_email'],
            "c_secondaryemail"=>$row['c_secondaryemail'],
            "c_other_acc"=>$row['c_other_acc'],
            "c_status"=>$row['c_status'],

        ]);

        DB::table('contacts')->where('c_name',$contact->c_name)->delete();

        //$product->assignRole($product->id);
        return $contact;
    }
}
