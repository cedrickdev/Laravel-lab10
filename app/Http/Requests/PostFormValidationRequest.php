<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormValidationRequest extends FormRequest
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
             'title' => ['required', 'min:4', 'unique:posts'],
             'slug'  => ['required', 'min:4', 'regex:/^[0-9a-z\-]+$/',],
             'content' => ['required'],
        ];
    }
   
     public function messages() :  array
    {
        return [
        'title.required' => 'Le titre est requis.',
        'title.min' => 'Le titre doit contenir au moins 8 caractères.',
        'content.required' => 'Le contenu du blog est requis'
    ];
    }
}
