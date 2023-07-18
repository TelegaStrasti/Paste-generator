<?php

namespace App\Http\Requests\Paste;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

final class PasteCreateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'text' => 'required|string',
            'access' => 'required|in:public,unlisted,private',
            'expires' => 'required|string',
            'language' => 'required|string',
        ];
    }
}
