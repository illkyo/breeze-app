<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ferry;

class FerryTicket extends Model
{
    use HasFactory;

    protected $fillable = ['visitors', 'total_price'];

    public function ferry() {
        return $this->belongsTo(Ferry::class);
    }

}
