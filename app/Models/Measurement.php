<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    use HasFactory;

    protected $fillable = ['measurementable_type', 'measurementable_id', 'value', 'unit', 'measured_at'];

    public function measurementable()
    {
        return $this->morphTo();
    }
}
