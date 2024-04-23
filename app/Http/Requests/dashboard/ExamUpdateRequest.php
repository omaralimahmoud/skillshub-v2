<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ExamUpdateRequest extends FormRequest
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
            'name_en' => 'required|string|max:100',
            'name_ar' => 'required|string|max:100',
            'description_en' => 'required|string|max:5000',
            'description_ar' => 'required|string|max:5000',
            'skill_id' => 'required|exists:skills,id',
            'image' => 'nullable|image|max:2048',
            'difficulty' => 'required|integer|min:1|max:5',
            'duration_minutes' => 'required|integer|min:1',
        ];
    }
}
