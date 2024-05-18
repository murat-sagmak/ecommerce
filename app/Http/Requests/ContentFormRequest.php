<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentFormRequest extends FormRequest
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
            'lname'=> 'required|string|min:3',
            'email'=> 'required|email',
            'subject'=>'required',
            'message'=> 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=> 'First Name is required.',
            'lname.required'=> 'Last Name is required.',
            'email.required'=> 'E-mail is required.',
            'email.email'=>'Unvalid email address.',
            'subject.required'=>'Subject must fill.',
            'message.required'=> 'Message is required.',
        ];
    }
    
}
