<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public array $translatable = ['name', 'description'];

    public function skill(): BelongsTo
    {
        return $this->belongsTo(Skill::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->withPivot('score', 'time_minutes', 'status', 'started_at', 'finished_at');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
