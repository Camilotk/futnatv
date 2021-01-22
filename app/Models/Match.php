<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    use HasFactory;

    protected $appends = [
        "formatted_date"
    ];

    public function channels()
    {
        return $this->belongsToMany('App\Models\Channel');
    }

    public function getDateAttribute($value)
    {
        return date('Y-m-d\T00:00:00', strtotime($value));
    }

    public function getFormattedDateAttribute()
    {
        return date('d/m/Y H:i:s', strtotime($this->date));
    }
}
