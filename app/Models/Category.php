<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['name', 'is_active'];

    public $translatable = ['name'];

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
}
