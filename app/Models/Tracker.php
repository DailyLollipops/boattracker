<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial',
        'boat_id'
    ];

    public function boat(){
        return $this->belongsTo(Boat::class, 'boat_id');
    }
}
