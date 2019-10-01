<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserBirthDayUpdateRequest extends FormRequest
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
            'birthdate' => 'date_format:Y/m/d'            
        ];
    }
    public function messages()
    {
        return [
            'birthdate.date_format' => 'The correct format to date is dd/mm/Y.'
        ];
    }
}
