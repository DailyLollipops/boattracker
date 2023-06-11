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
        'latitude',
        'longitude'
    ];

    public function tracker(){
        return $this->hasOne(Tracker::class, 'boat_id');
    }

    public function owner(){
        return $this->belongsTo(Owner::class, 'owner_id');
    }
}
