<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkEntranceTicket extends Model
{
    /** @use HasFactory<\Database\Factories\ParkEntranceTicketFactory> */
    use HasFactory;
    protected $fillable = ['visitor_id', 'price'];
}
