<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;

    protected $fillable = ['farm_id', 'name', 'type', 'description'];

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }

    public function readings()
    {
        return $this->hasMany(SensorReading::class);
    }
}
