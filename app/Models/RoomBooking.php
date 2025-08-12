<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;

class RoomBooking extends Model
{
    /** @use HasFactory<\Database\Factories\RoomBookingFactory> */
    use HasFactory;
    protected $fillable = ['room_id', 'visitor_id', 'visitor_count', 'total_price'];

    public function room() {
        return $this->belongsTo(Room::class);
    }
}
