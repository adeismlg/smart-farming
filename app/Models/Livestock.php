<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livestock extends Model
{
    use HasFactory;

    protected $fillable = ['farm_id', 'name', 'type', 'initial_count', 'attributes'];

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }

    public function transactions()
    {
        return $this->hasMany(LivestockTransaction::class);
    }

    public function getCurrentCountAttribute()
    {
        $initialCount = $this->initial_count;
        $transactionsSum = $this->transactions()->sum('quantity');
        return $initialCount + $transactionsSum;
    }

    public function measurements()
    {
        return $this->morphMany(Measurement::class, 'measurementable');
    }
}
