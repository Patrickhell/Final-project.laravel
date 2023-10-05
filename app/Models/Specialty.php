<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class, 'specialty_user', 'user_id', 'specialty_id');
    }
}
