<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class sinhVienRequest extends FormRequest
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
            'ten' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'ngay_sinh' => 'required',
            'password' => 'required',
            'so_dien_thoai' => 'required',
            'gioi_tinh' => 'required',
            'ma_lop' => 'required',
            'anh_dai_dien' => 'image|max:2028',
        ];
    }

        public function messages()
    {
        return [
            'ten.required' => 'Tên không được để trống',
            'email.required' => 'Email không được để trống',
            'username.required' => 'Username không được để trống',
            'password.required' => 'Password không được để trống',
            'ngay_sinh.required' => 'Chọn ngày sinh',
            'so_dien_thoai.required' => 'Số điện thoại không được để trống',
            'gioi_tinh.required' => 'Giới tính không được để trống',
            'ma_lop.required' => ' Chọn lớp',
             'anh_dai_dien.image' => 'Định dạng ảnh không cho phép',
            'anh_dai_dien.max' => 'Kích thước ảnh file quá lớn',
        ];
    }
}
