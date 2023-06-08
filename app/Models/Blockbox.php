<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blockbox extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function boat(){
        return $this->belongsTo(Boat::class, 'boat_id');
    }
}
