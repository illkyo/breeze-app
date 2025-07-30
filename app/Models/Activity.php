<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Enums\Type;
use App\Models\Tag;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'price'];

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    protected function casts(): array
    {
        return [
            'type' => Type::class
        ];
    }
}
