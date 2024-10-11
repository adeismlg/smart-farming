<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivestockTransaction extends Model
{
    use HasFactory;

    protected $fillable = ['livestock_id', 'type', 'quantity', 'description', 'date'];

    public function livestock()
    {
        return $this->belongsTo(Livestock::class);
    }
}
