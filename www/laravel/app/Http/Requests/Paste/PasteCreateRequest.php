<?php

namespace App\Http\Requests\Paste;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Enums\PasteAccesses;
use Illuminate\Validation\Rule;

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
        $accessValues = [
            PasteAccesses::UNLISTED->value,
            PasteAccesses::PRIVATE->value,
            PasteAccesses::PUBLIC->value,
        ];

        return [
            'title' => 'required|string',
            'text' => 'required|string',
            'access' => ['required', Rule::in($accessValues)],
            'expires' => 'required|string',
            'language' => 'required|string',
        ];
    }
}
