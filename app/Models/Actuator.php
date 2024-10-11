<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actuator extends Model
{
    use HasFactory;

    protected $fillable = ['farm_id', 'name', 'type', 'description', 'status'];

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }

    public function logs()
    {
        return $this->hasMany(ActuatorLog::class);
    }
}
