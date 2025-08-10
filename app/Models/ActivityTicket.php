<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Activity;

class ActivityTicket extends Model
{
    /** @use HasFactory<\Database\Factories\ActivityTicketFactory> */
    use HasFactory;
    protected $fillable = ['visitor_id', 'visitor_count', 'total_price'];

    public function activity() {
        return $this->belongsTo(Activity::class);
    }
}
