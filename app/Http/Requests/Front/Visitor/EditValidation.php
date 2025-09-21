<?php

 /*
 * Mr. Shayan Khan
 * CyberArts Pvt. Ltd.
 * Warsak Road, Peshawar
 * +923330700333
 * dos.shayan@gmail.com
 * https://alampk.com
 */
namespace App\Http\Requests\Front\Visitor;

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
            'purpose'         => 'required',
            'date'              => 'required',
            'in_time'           => 'required',
            'name'              => 'required',
            'file'              => 'mimes:pdf,doc,docx,ppt,xls,xlsx,jpeg,jpg,bmp,png',

        ];
    }

    public function messages()
    {
        return [
            'purpose.required' => 'Visitor Visit Purpose Required.',
        ];
    }
}
