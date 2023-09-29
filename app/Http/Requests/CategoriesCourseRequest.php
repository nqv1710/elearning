<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesCourseRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name_category_courses' => ['required'],
            'slug' =>['required','regex:/^[^0-9].*$/','unique:categories_course']
        ];
    }

    public function messages()
    {
        return [
            'name_category_courses.required' => 'Tên thể loại không được bỏ trống',
            'name_category_courses.unique' => 'Tên thể loại đã tồn tại',

            'slug.required' => 'Mã thể loại không được bỏ trống',
            'slug.regex' => 'Mã thể loại không được chứa kí tự số đầu tiên',
            'slug.unique' => 'Mã thể loại đã tồn tại',


        ];
    }
}
