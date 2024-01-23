<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Exam extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['name', 'description', 'image', 'question_number', 'difficulty', 'duration_minutes', 'is_active', 'skill_id'];

    public $translatable = ['name', 'description'];

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
