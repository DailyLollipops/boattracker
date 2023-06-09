<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'contact',
        'barangay'
    ];

    public function boats(){
        return $this->hasMany(Boat::class, 'owner_id');
    }
}
