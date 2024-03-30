<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexPageFormRequest extends FormRequest
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
            'bannerTitle' => 'required|string|between:10,60',
            'bannerExcerpt' => 'required|string|between:50,150',
            'buttonTitle' => 'required|string|between:4,20',

            'featureTitle' => 'required|string|between:10,60',
            'featureText' => 'required|string|between:50,250',
            'featureBannerTitle1' => 'required|string|between:5,30',
            'featureBannerSlogan1' => 'required|string|between:5,30',
            'featureBannerTitle2' => 'required|string|between:5,30',
            'featureBannerSlogan2' => 'required|string|between:5,30',
            'featureBannerTitle3' => 'required|string|between:5,30',
            'featureBannerSlogan3' => 'required|string|between:5,30',

            'colourDividerText' => 'required|string|between:10,150',
            'colourDividerButton' => 'required|string|between:5,50',
        ];
    }
}
