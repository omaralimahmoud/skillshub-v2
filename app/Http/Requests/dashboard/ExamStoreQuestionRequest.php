<?php

namespace App\Http\Requests\dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ExamStoreQuestionRequest extends FormRequest
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
        $this->session()->flash('current', 'exam/'.$this->route('exam')->id);

        return [
            'titles' => 'required|array',
            'titles.*' => 'required|string|max:500',
            'right_answers' => 'required|array',
            'right_answers.*' => 'required|in:1,2,3,4',
            'option_1s' => 'required|array',
            'option_1s.*' => 'required|string|max:255',
            'option_2s' => 'required|array',
            'option_2s.*' => 'required|string|max:255',
            'option_3s' => 'required|array',
            'option_3s.*' => 'required|string|max:255',
            'option_4s' => 'required|array',
            'option_4s.*' => 'required|string|max:255',
        ];
    }

    // protected function prepareForValidation(){}
}
