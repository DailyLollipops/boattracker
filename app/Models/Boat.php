<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boat extends Model
{
    use HasFactory;
    protected $fillable = [
        'owner_id',
        'name',
        'license',
        'type',
        'color',
    ];

    public function owner(){
        return $this->belongsTo(Owner::class, 'owner_id');
    }

    public function tracks(){
        return $this->hasMany(Track::class, 'boat_id');
    }

    public function getLatestTrack(){
        return $this->tracks()->latest()->first();
    }
}
