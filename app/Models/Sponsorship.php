<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class)
                    ->withPivot('sponsorship_start_date', 'sponsorship_end_date');
    }
}
