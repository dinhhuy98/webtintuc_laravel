<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTheLoaiRequest extends FormRequest
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
            //
            'theloai'=>'bail|required|min:2|max:100|unique:App\TheLoai,Ten'
        ];
    }

    public function messages(){
        return [
            'theloai.required'=>"Không được để trống",
            'theloai.min'=>"Độ dài từ 2-100 kí tự",
            'theloai.max'=>"Độ dài từ 2-100 kí tự",
            'theloai.unique'=>'Thể loại này đã tồn tại'
            
        ];
    }
}
