<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
     /**
     * Get the products for categorys.
     */
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
