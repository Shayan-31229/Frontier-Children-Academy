<?php

 /*
 * Mr. Shayan Khan
 * CyberArts Pvt. Ltd.
 * Rupani 1 (Province 2, Saptari), Nepal
 * +923330700333
 * dos.shayan@gmail.com
 * https://alampk.com
 */
namespace App\Http\Requests\Academic\Semester;

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
            'semester'         => 'required | max:50',
            'slug'          => 'required | max:50 | unique:semesters,slug,'.decrypt($this->request->get('id')),
        ];
    }

    public function messages()
    {
        return [
            'semester.required' => 'Please, Add Semester.',
        ];
    }
}
