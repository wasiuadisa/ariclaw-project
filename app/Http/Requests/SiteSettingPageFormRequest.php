<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteSettingPageFormRequest extends FormRequest
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
//            'header_logo',
//            'header_logo_alt_text',
//            'favicon_logo',
            'footer_text' => 'nullable|string|between:20,1000',
            'facebook_address' => 'nullable|string|max:230',
            'twitter_address' => 'nullable|string|max:230',
            'instagram_address' => 'nullable|string|max:230',
            'skype_address' => 'nullable|string|max:230',
            'contact_address' => 'nullable|string|between:20,1000',
            'contact_phone' => 'nullable|string|max:20',
            'contact_email' => 'nullable|string|max:230',
            'contact_website' => 'nullable|string|max:230',
        ];
    }
}
