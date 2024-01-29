<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Exam extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'skill_id',
        'name',
        'description',
        'image',
        'question_number',
        'difficulty',
        'duration_minutes',
        'is_active',
    ];

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
