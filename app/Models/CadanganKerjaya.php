<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CadanganKerjaya extends Model
{
    use HasFactory;

    protected $table = 'cadangan_kerjayas';

    protected $fillable = [
        'job', 
        'phone', 
        'address', 
        'image',
        'course_id', // Tambah field course_id
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relationship ke Course
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
