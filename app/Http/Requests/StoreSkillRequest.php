<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSkillRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

            'category_id' => 'required|exists:categories,id',

            'title' => 'required|min:3|max:100',

            'description' => 'nullable|max:500',

            'experience_level' => 'required|in:Beginner,Intermediate,Advanced',


        ];
    }

    public function messages()
    {
        return [

            'category_id.required' => 'Please select a category.',

            'category_id.exists' => 'Selected category is invalid.',

            'title.required' => 'Please enter a skill title.',

            'title.min' => 'Title must be at least 3 characters.',

            'title.max' => 'Title cannot exceed 100 characters.',

            'description.max' => 'Description cannot exceed 500 characters.',

            'experience_level.required' => 'Please select an experience level.',

            'experience_level.in' => 'Please select a valid experience level.',

            'created_by.required' => 'Please enter the creator name.',

            'created_by.min' => 'Creator name must be at least 3 characters.',

            'created_by.max' => 'Creator name cannot exceed 100 characters.',

        ];
    }
}