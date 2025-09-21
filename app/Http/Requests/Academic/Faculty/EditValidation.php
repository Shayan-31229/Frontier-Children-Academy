<?php

 /*
 * Mr. Shayan Khan
 * CyberArts Pvt. Ltd.
 * Rupani 1 (Province 2, Saptari), Nepal
 * +923330700333
 * dos.shayan@gmail.com
 * https://alampk.com
 */
namespace App\Http\Requests\Academic\Faculty;

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
            'faculty' => 'required | max:100 | unique:faculties,faculty,'.decrypt($this->request->get('id')),
            'faculty_code'      => 'required',
        ];
    }

    public function messages()
    {
        return [
            'faculty.required' => 'Please, Add Faculty.',
            'faculty.unique' => 'The Faculty/Program/Classalready exist. Please, edit or create new.',
        ];
    }
}
