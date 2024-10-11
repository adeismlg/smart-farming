<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'farm_id', 'name', 'object_type', 'object_id', 'details', 'start_time', 'end_time', 'status'
    ];

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }

    public function object()
    {
        return $this->morphTo();
    }
}

