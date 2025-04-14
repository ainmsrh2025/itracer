<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyRecord extends Model
{
    use HasFactory;

    protected $fillable = ['alumni_id', 'question_id', 'status', 'answer','year'];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'alumni_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

}
