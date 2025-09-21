<?php

 /*
 * Mr. Shayan Khan
 * CyberArts Pvt. Ltd.
 * Warsak Road, Peshawar
 * +923330700333
 * dos.shayan@gmail.com
 * https://alampk.com
 */
namespace App\Http\Requests\Examination\Exam;

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
             'title' => 'required | unique:exams,title,'.decrypt($this->request->get('id')),
         ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please, Add Faculty.',
            'title.unique' => 'This Exam Title Already Register',
        ];
    }
}
