<?php

 /*
 * Mr. Shayan Khan
 * CyberArts Pvt. Ltd.
 * Warsak Road, Peshawar
 * +923330700333
 * dos.shayan@gmail.com
 * https://alampk.com
 */
namespace App\Http\Requests\Web\Registration;

use Illuminate\Foundation\Http\FormRequest;

class FindValidation extends FormRequest
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
            'web_registration_programmes_id'    => 'required',
            'reg_no'                      => 'required',
            'date_of_birth'                 => 'required',
            'name'                          => 'required',

        ];
    }

    public function messages()
    {
        return [
                'web_registration_programmes_id.required'  =>    'Programme Applied For Required.'
        ];
    }
}