<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActuatorLog extends Model
{
    use HasFactory;

    protected $fillable = ['actuator_id', 'action', 'action_time', 'description'];

    public function actuator()
    {
        return $this->belongsTo(Actuator::class);
    }
}
