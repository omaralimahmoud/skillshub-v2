<?php

namespace App\Http\Requests\dashboard;

use App\Models\Skill;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class SkillUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|exists:skills,id',
            'name_en' => 'required|string|max:50',
            'name_ar' => 'required|string|max:50',
            'image' => 'nullable|image|max:2048',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function updateSkill()
    {
        $skill = Skill::findOrFail($this->id);
        $pathImage = $skill->image;
        if ($this->hasFile('image')) {
            Storage::delete('skills', $pathImage);
            $pathImage = Storage::put('skills', $this->file('image'));
        }

        $skill->update([
            'name' => [
                'en' => $this->name_en,
                'ar' => $this->name_ar,
            ],
            'image' => $pathImage,
            'category_id' => $this->category_id,
        ]);

    }
}
