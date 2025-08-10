<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\RoomBooking;

class Room extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'price'];

    public function roomBookings() {
        return $this->hasMany(RoomBooking::class);
    }
}
