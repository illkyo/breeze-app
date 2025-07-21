<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\FerryTicket;

class Ferry extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price'];

    public function ferryTickets() {
        return $this->hasMany(FerryTicket::class);
    }
    
}
