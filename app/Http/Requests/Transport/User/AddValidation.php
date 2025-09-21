<?php

 /*
 * Mr. Shayan Khan
 * CyberArts Pvt. Ltd.
 * Warsak Road, Peshawar
 * +923330700333
 * dos.shayan@gmail.com
 * https://alampk.com
 */
namespace App\Http\Requests\Transport\User;

use Illuminate\Foundation\Http\FormRequest;

class AddValidation extends FormRequest
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
            'user_type'         => 'required',
            'reg_no'            => 'required | max:15',
            'route'             => 'required',
            'vehicle_select'    => 'required',
        ];
    }

   /* public function messages()
    {
        return [
            'title.unique' => 'This Time Already Register',
        ];
    }*/
}
