<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamMemberFormRequest extends FormRequest
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
            'fullname' => 'required|string|between:5,150',
            'title'  => 'required|string|max:150',
            //'email'  => 'required|email:rfc,dns|max:150',
            'email'  => 'required|email:rfc,filter|max:150',
            'twitter'  => 'string|max:200',
            'skype'  => 'string|max:200',
            'instragram'  => 'string|max:200',
        ];
    }
}
