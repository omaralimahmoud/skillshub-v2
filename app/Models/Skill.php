<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Skill extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'image',
        'is_active',
        'category_id',
    ];

    public $translatable = ['name'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function getStudentsCount()
    {
        $studentCount = 0;
        foreach ($this->exams as $exam) {
            $studentCount += $exam->users->count();
        }

        return $studentCount;
    }
}
