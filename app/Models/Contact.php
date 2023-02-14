<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['c_owner', 'c_name', 'c_phone', 'c_mobile', 'c_company', 'c_email', 'c_secondaryemail', 'c_other_acc', 'c_status'];
}
