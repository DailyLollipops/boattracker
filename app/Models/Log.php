<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $appends = [
        'boat_info'
    ];

    protected $fillable = [
        'boat_id',
        'status'
    ];

    public function boat(){
        return $this->belongsTo(Boat::class, 'boat_id');
    }

    public function getBoatInfoAttribute(){
        return $this->boat()->get();
    }
}
