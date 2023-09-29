<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequests extends FormRequest
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
            'name' => ['required', 'min:5'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:1', 'same:confirm_password'],
            'confirm_password' => ['required', 'min:1'],
            'phonenumber' => ['required', 'min:10', 'max:10', 'regex:/^\d{10}$/'],
            'images' => ['required','max:5120']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Họ và tên không được bỏ trống',
            'name.min' => 'Độ dài phải hơn 5 kí tự',
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Mật khẩu không được bỏ trống',
            'password.same' => 'Mật khẩu không trùng khớp',
            'password.min' => 'Mật khẩu phải có độ dài 8 kí tự',

            'confirm_password.required' => 'Mật khẩu không được bỏ trống',
            'confirm_password.min' => 'Mật khẩu phải có độ dài 8 kí tự',


            'phonenumber.required' => 'Số điện thoại không được bỏ trống',
            'phonenumber.min' => 'Số điện thoại không quá 10 chữ số',
            'phonenumber.max' => 'Số điện thoại không quá 10 chữ số',
            'phonenumber.regex' => 'Số điện thoại không đúng định dạng',

            'images.required' => 'Vui lòng chọn ảnh',
            'images.max' => 'Vui lòng chọn file có kích thước dưới 5MB'


        ];
    }
}
