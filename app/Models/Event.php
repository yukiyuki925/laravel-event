<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Event extends Model
{
    protected $fillable = [
        'event_title',
        'area_id',
        'start_event_date',
        'end_event_date',
        'start_time',
        'end_time',
        'description',
        'place',
        'price_type_id',
        'price',
        'img',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function priceType()
    {
        return $this->belongsTo(PriceType::class);
    }

    public function likedUsers()
    {
        return $this->belongsToMany(User::class, 'event_likes');
    }

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->img);
    }

    // event

    // 年月日形式に変換
    public function getFormattedStartDateAttribute()
    {
        return Carbon::parse($this->start_event_date)->format('Y年n月j日');
    }

    // 年月日形式に変換
    public function getFormattedEndDateAttribute()
    {
        return Carbon::parse($this->end_event_date)->format('Y年n月j日');
    }

    // 時間の最後の:00を切り捨てる
    public function getFormattedStartTimeAttribute()
    {
        return Carbon::parse($this->start_time)->format('H:i');
    }

    // 時間の最後の:00を切り捨てる
    public function getFormattedEndTimeAttribute()
    {
        return Carbon::parse($this->end_time)->format('H:i');
    }
}
