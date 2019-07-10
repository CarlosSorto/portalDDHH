<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'              => ['required'],
            'phone'             => ['required'],
            'email'             => ['required', 'email'],
            'description'       => ['required'],
            'long_description'  => ['required'],
            'classification_id' => ['required', 'exists:classifications,id'],
            'country_id'        => ['required', 'exists:countries,id'],
            'image'             => ['required', 'image'],
            'applicant'         => ['required'],
            'institution'       => ['required'],
            'position'          => ['required'],
            'workareas'         => ['required'],
            'website'           => ['required'],
            'longitude'           => ['required'],
            'latitude'           => ['required'],
        ];
    }
}
