<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamSubject extends Model
{
    protected $table = 'exam_subjects';

    protected $guarded = [];

    // public function questions()
    // {
    //     return $this->belongsToMany(Section::class, 'subject_questions')->withTimestamps();
    // }

}
