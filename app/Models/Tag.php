<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;
use App\Models\Activity;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    public function jobs() {
        return $this->belongsToMany(Job::class, relatedPivotKey: 'job_listing_id');
    }

    public function activities() {
        return $this->belongsToMany(Activity::class);
    }
}
