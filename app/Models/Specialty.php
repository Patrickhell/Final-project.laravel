<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(UserDetail::class, 'user_specialty', 'specialty_id', 'user_detail_id');
    }
}
