<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['location_id', 'code', 'capacity'];

    public function location() {
        return $this->belongsTo(Location::class);
    }

    public function placements() {
        return $this->hasMany(Placement::class)->orderBy('id', 'desc');
    }
}
