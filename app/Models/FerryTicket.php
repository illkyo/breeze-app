<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ferry;

class FerryTicket extends Model
{
    use HasFactory;

    protected $fillable = ['ferry_id', 'visitor_id', 'visitor_count', 'total_price'];
    
    public function ferry() {
        return $this->belongsTo(Ferry::class);
    }

}
