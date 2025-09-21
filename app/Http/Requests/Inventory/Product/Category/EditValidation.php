<?php

 /*
 * Mr. Shayan Khan
 * CyberArts Pvt. Ltd.
 * Warsak Road, Peshawar
 * +923330700333
 * dos.shayan@gmail.com
 * https://alampk.com
 */
namespace App\Http\Requests\Inventory\Product\Category;

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
            'title'             => 'required | max:50 | unique:categories,title,'.decrypt($this->request->get('id')),
            'name.*'              => 'required',
        ];
    }

   /* public function messages()
    {
        return [
            'title.required' => 'Please, Add Title.',
            'name' => 'Please, Add Category Name',
            'percentage_from' => 'Please, Add Percentage From.',
            'percentage_to' => 'Please, Add Percentage To.',
        ];
    }*/

}
