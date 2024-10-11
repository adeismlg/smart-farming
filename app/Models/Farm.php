<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'location', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }

    public function livestock()
    {
        return $this->hasMany(Livestock::class);
    }

    public function sensors()
    {
        return $this->hasMany(Sensor::class);
    }

    public function actuators()
    {
        return $this->hasMany(Actuator::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}

