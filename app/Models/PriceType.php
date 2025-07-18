<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceType extends Model
{
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}