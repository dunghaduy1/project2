<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class diemRequest extends FormRequest
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
            'diem' => 'numeric|between:0,10',
        ];
    }
    public function messages()
    {
        return [
            'diem.digits_between' => 'Điểm nhập từ 0 đến 10',
        ];
    }
}
