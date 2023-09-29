<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonsRequest extends FormRequest
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
            'title' => ['required', 'min:5'],
            'content' => ['required']
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề không được bỏ trống',
            'title.min' => 'Tiêu đề phải dài hơn 5 kí tự',

            'content.required' => 'Nội dung không được bỏ trống'
        ];
    }
}
