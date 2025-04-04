<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    /** @use HasFactory<\Database\Factories\JobTypeFactory> */
    use HasFactory;

    public function jobs() {
        return $this->hasMany(Job::class, 'type_id');
    }
}
