<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'birth_date',
        'phone_number',
        'work_address',
        'personal_address',
        'performance',
        'profile_picture',
        'cv_file',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function specialties()
    {
        return $this->belongsToMany(Specialty::class, 'user_specialty', 'user_detail_id', 'specialty_id');
    }
}
