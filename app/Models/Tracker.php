<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{
    use HasFactory;

    protected $appends = [
        'latest_coordinate'
    ];

    protected $fillable = [
        'serial',
        'boat_id'
    ];

    public function boat(){
        return $this->belongsTo(Boat::class, 'boat_id');
    }

    public function tracks(){
        return $this->hasMany(Track::class, 'tracker_id');
    }

    public function getLatestCoordinateAttribute(){
        return $this->tracks()->latest()->first();
    }
}
