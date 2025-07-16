<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function area()
    {
        return $this->hasMany(Event::class);
    }
}
