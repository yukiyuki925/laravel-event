<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'event_title',
        'area_id',
        'start_event_date',
        'end_event_date',
        'description',
        'place',
        'tag_id',
        'price',
        'img',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->img);
    }
}