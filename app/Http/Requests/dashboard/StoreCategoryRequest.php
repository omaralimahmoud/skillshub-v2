<?php

namespace App\Http\Requests\dashboard;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name_en' => 'required|string|max:50',
            'name_ar' => 'required|string|max:50',
        ];
    }

    public function addCategory()
    {
        Category::create([
            'name' => [
                'en' => $this->name_en,
                'ar' => $this->name_ar,
            ],

        ]);
    }
}
