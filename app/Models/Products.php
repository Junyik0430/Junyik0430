<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ['p_name', 
    'p_owner', 
    'p_status', 
    'p_category', 
    'p_price', 
    'p_quantity',
    'v_name',
    'manufacturer'];
}
