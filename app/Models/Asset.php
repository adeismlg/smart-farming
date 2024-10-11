<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = ['farm_id', 'name', 'type', 'description'];

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }

    public function measurements()
    {
        return $this->hasMany(Measurement::class);
    }
}

