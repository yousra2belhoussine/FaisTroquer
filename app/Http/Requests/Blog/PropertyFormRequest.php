<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
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
            'titre' => ['required', 'min:4'],
            'auteur' => ['required', 'min:3'],
            'contenu' => ['required', 'min:10'],
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'options' => ['exists:options,id', 'required'],

        ];
    }
}
