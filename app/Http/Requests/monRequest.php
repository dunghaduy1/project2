<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class monRequest extends FormRequest
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
            'ten_mon' => 'required',
            'ma_nganh' => 'required',
        ];
    }
     public function messages()
    {
        return [
            'ten_mon.required' => 'Tên môn không được để trống',
            'ma_nganh.required' => 'Chọn ngành',
        ];
    }
}
