<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;
    protected $fillable = [
        'latitude',
        'longitude',
        'status'
    ];

    public function boat(){
        return $this->belongsTo(Boat::class, 'boat_id');
    }
}
