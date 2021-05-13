<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Introduce extends Model
{
    use HasFactory;
    /**
     * Get the introduceDetail for introduce.
     */
    public function introduceDetail()
    {
        return $this->hasMany(IntroduceDetail::class);
    }
}
