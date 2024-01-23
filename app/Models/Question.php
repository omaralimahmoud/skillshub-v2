<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'option_1', 'option_2', 'option_3', 'option_4', 'right_answer', 'exam_id'];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
