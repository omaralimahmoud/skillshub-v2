<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public array $translatable = ['name'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function exams(): HasMany
    {
        return $this->hasMany(Exam::class);
    }

    public function getStudentsCount(): int
    {
        $studentCount = 0;
        foreach ($this->exams as $exam) {
            $studentCount += $exam->users->count();
        }

        return $studentCount;
    }
}
