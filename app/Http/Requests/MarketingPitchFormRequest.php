<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarketingPitchFormRequest extends FormRequest
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
            'icon' => 'required|string|max:50',
            'title'  => 'required|string',
            'caption'  => 'required|string|max:4000',
        ];
    }
}
