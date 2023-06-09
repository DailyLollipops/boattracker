<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;
    protected $fillable = [
        'latitude',
        'longitude',
        'restricted',
        'warning'
    ];

    public function boat(){
        return $this->belongsTo(Boat::class, 'boat_id');
    }
}
