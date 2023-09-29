<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
        return  [
            'name_course' => ['required', 'min:5', 'unique:courses'],
            'description' => ['required'],
            'image' => ['max:5120']
        ];
    }

    public function messages()
    {
        return [
            'name_course.required' => 'Tên khóa học không được bỏ trống',
            'name_course.min' => 'Độ dài phải hơn 5 kí tự',
            'name_course.unique' => 'Tên khóa học đã tồn tại',

            'description.required' => 'Chi tiết khóa học không được bỏ trống',
            // 'description.min' => 'Chi tiết khóa học phải lớn hơn 1 kí tự',

            'image.max' => 'Vui lòng chọn file có kích thước dưới 5MB'


        ];
    }
}
