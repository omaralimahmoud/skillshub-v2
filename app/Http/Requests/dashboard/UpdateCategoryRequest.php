<?php

namespace App\Http\Requests\dashboard;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'id' => 'required|exists:categories,id',
            'name_en' => 'required|string|max:50',
            'name_ar' => 'required|string|max:50',
        ];
    }

    public function updateCategory()
    {
        Category::findOrFail($this->id)->update([
            'name' => [
                'en' => $this->name_en,
                'ar' => $this->name_ar,
            ],
        ]);
    }
}
