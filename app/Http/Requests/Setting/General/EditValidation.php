<?php

 /*
 * Mr. Shayan Khan
 * CyberArts Pvt. Ltd.
 * Warsak Road, Peshawar
 * +923330700333
 * dos.shayan@gmail.com
 * https://alampk.com
 */
namespace App\Http\Requests\Setting\General;

use Illuminate\Foundation\Http\FormRequest;

class EditValidation extends FormRequest
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
             'institute'         =>  'required',
             'address'           =>  'required',
             'phone'             =>  'required',
             'email'             =>  'required',
             'time_zones_id'     =>  'exists:time_zones,id',
         ];
    }

    public function messages()
    {
        return [

        ];
    }
}
