<?php

 /*
 * Mr. Shayan Khan
 * CyberArts Pvt. Ltd.
 * Warsak Road, Peshawar
 * +923330700333
 * dos.shayan@gmail.com
 * https://alampk.com
 */
namespace App\Http\Requests\Inventory\SemAssets;

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
            'semester_select'       => 'required',
            'assets'       => 'required',
            'quantity'       => 'required'
        ];
    }

    public function messages()
    {
        return [
            'semester_select.required'    => 'Semester/Section is Required',
            'assets.required'       => 'Assets is Required',
            'quantity.required'        => 'Quantity is Required'
        ];
    }
}
