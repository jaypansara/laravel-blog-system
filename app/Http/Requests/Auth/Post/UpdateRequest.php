<?php

namespace App\Http\Requests\Auth\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

            return [
                'file' => ['nullable', 'file', 'mimes:png,jpg,docx,pdf,jpeg,csv,txt,xlx,xls'],
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:3000'],
                'status' => ['required', 'integer','max:255'],
                'category' => ['required', 'integer','max:255'],
                'tags' => ['required', 'array'],
                'tags.*' => ['required', 'string','max:255']
            ];

    }
}