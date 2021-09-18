<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamQuestionMaster extends Model
{
    protected $table = 'exam_question_masters';

    protected $guarted = [];

    // public function ExamSubject()
    // {
    //     return $this->belongsToMany(ExamSubject::class, 'subject_questions')->withTimestamps();
    // }

}
