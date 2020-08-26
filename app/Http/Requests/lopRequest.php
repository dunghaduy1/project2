<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class lopRequest extends FormRequest
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
            'ten_lop' => 'required',
            'ma_khoa' => 'required',
            'ma_nganh' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'ten_lop.required' => 'Tên ngành không được để trống',
            'ma_khoa.required' => 'Tên khóa không được để trống',
            'ma_nganh.required' => 'Tên ngành không được để trống',
        ];
    }
}
