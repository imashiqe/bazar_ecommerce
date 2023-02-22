<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    function subcategory(){


        return $this->belongsTo(SubCategory::class, 'category_id');
    }
    
}
