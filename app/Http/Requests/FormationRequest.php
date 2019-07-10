<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormationRequest extends FormRequest
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
            'duration'          => ['required'],
            'place'             => ['required'],
            'since'             => ['required'],
            'until'             => ['required'],
            'public'            => ['required'],
            'organizer'         => ['required'],
            'representative'    => ['required'],
            'position'          => ['required'],
            'email'             => ['required'],
            'website'           => ['required'],
            'link'              => ['required'],
            'active'            => ['boolean'],
            'description'       => ['required'],
            'modality_id'       => ['required'],
            'country_id'        => ['required'],
            'formation_type_id' => ['required'],
        ];
    }
}
