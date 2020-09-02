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
            'email' => 'required|email',
            'ngay_sinh' => 'required',
            'so_dien_thoai' => 'required',
            'gioi_tinh' => 'required',
            'ma_lop' => 'required',

        ];
    }

        public function messages()
    {
        return [
            'ten.required' => 'Tên không được để trống',
            'email.required' => 'Email không được để trống',
            'ngay_sinh.required' => 'Chọn ngày sinh',
            'so_dien_thoai.required' => 'Số điện thoại không được để trống',
            'gioi_tinh.required' => 'Giới tính không được để trống',
            'ma_lop.required' => ' Chọn lớp',
        ];
    }
}
