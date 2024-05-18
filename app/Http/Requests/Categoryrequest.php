<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name'=> 'required|string|min:3',
            'content'=> 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=> 'Name is required.',
            'name.string'=> 'Name should be string.',
            'name.min'=> 'Name is min. 3.',
            'content.required'=> 'Content is required.',


            
        ];
    }
}
