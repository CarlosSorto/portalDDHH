<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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
            'title'             => ['required'],
            'author'            => ['required'],
            'description'       => ['required'],
            'long_description'  => ['required'],
            'published_date'    => ['required'],
            'country_id'        => ['required', 'integer', 'exists:countries,id'],
            'organization_id'   => ['required', 'integer', 'exists:organizations,id'],
            'keywords'          => ['required'],
            'file'              => ['required', 'file'],
            'name_applicant'    => ['required'],
            'institution'       => ['required'],
            'position'          => ['required'],
            'topics'            => ['required'],
        ];
    }
}
