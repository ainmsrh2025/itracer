<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Alumni extends Authenticatable
{
    protected $table = 'alumnis'; // Pastikan guna table yang betul
    protected $fillable = ['username', 'password', 'name', 'email', 'status', 'profile_picture', 'kos'];
    protected $hidden = ['password'];

    public function surveyRecords()
    {
        return $this->hasMany(SurveyRecord::class, 'alumni_id');
    }
}

