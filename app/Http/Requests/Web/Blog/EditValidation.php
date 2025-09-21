<?php

 /*
 * Mr. Shayan Khan
 * CyberArts Pvt. Ltd.
 * Warsak Road, Peshawar
 * +923330700333
 * dos.shayan@gmail.com
 * https://alampk.com
 */
namespace App\Http\Requests\Web\Blog;

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
            'title' => 'required | unique:web_blogs,title,'.decrypt($this->request->get('id')),
            'category_id' => 'required',
            'main_image' => 'mimes:jpeg,jpg,bmp,png,gif | dimensions:min_width=870,min_height=439',
            'detail_desc' => 'required',
            'publish_date' => 'required',
            'seo_title' => 'required',
            'seo_keywords' => 'required',
            'seo_description' => 'required',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
