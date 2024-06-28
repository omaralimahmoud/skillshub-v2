<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => asset("uploads/$this->image"),
            'is_active' => $this->is_active,
            'difficulty' => $this->difficulty,
            'duration_minutes' => $this->duration_minutes,
            'question_number' => $this->question_number,
            'questions' => QuestionResource::collection($this->whenLoaded('questions')),

        ];
    }
}
