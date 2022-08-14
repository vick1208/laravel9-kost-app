<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Placement extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function room() {
        return $this->belongsTo(Room::class);
    }

    public function occupant() {
        return $this->belongsTo(Occupant::class);
    }
}
