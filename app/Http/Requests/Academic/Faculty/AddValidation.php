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
            'faculty'       => 'required | max:100 | unique:faculties,faculty',
            'faculty_code'      => 'required | unique:faculties,faculty_code',
        ];
    }

    public function messages()
    {
        return [
            'faculty.required' => 'Please, Add Faculty.',
            'faculty.unique' => 'The Faculty/Program/Class already exist. Please, edit or create new.',
            'faculty_code.unique' => 'The Faculty code already exist. Please Enter Unique Faculty Code.',
        ];
    }
}
