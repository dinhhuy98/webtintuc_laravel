<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;


use Illuminate\Foundation\Http\FormRequest;

class EditTheLoaiRequest extends FormRequest
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
            'theloai'=>['bail',
                        'required',
                        'min:2',
                        'max:100',
                        Rule::unique('the_loai','Ten')->ignore($this->route('theloai')),],
            'loaitin_moi'=>['bail',
                            'nullable',
                        'min:2',
                        'max:100',
                        Rule::unique('loai_tin','Ten'),],
        ];
    }

    public function messages(){
        return [
            'theloai.required'=>"Không được để trống",
            'theloai.min'=>"Độ dài từ 2-100 kí tự",
            'theloai.max'=>"Độ dài từ 2-100 kí tự",
            'theloai.unique'=>'Thể loại này đã tồn tại',
            'loaitin_moi.min'=>"Độ dài từ 2-100 kí tự",
            'loaitin_moi.max'=>"Độ dài từ 2-100 kí tự",
            'loaitin_moi.unique'=>'Loại tin này đã tồn tại',
        ];
    }
}
