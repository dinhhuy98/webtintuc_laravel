<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTinTucRequest extends FormRequest
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
            'tieude'=>[
                'bail',
                'required',
                'min:2',
                'max:200'
            ],
            'theloai'=>[
                'bail',
                'required',
                'exists:the_loai,id',
            ],
            'loaitin'=>[
                'bail',
                'exists:loai_tin,id'
            ],
            'tomtat'=>[
                'bail',
                'required',
                'min:2'
            ],
            'noidung'=>[
                'bail',
                'required',
                'min:2',
            ],
            'image'=>[
                'bail',
                'required',
                'image',
                'file'
            ]
        ];
    }
    public function messages(){
        return [
            'tieude.required'=>"Không được để trống",
           'tieude.min'=>'Độ dài từ 2-200 kí tự',
            'tieude.max'=>'Độ dài từ 2-200 kí tự',

            'theloai.required'=>"Không được để trống",
             'theloai.exists'=>'Thể loại này không tồn tại',

             
             'loaitin.exists'=>'Lọai tin này không tồn tại',

             'tomtat.required'=>"Không được để trống",
             'tomtat.min'=>'Độ dài tối thiểu 2 kí tự',

             'noidung.required'=>"Không được để trống",
             'noidung.min'=>'Độ dài tối thiểu 2 kí tự',

             'image.required'=>"Vui lòng upload ảnh",
            'image.image'=>'Sai định dạng ảnh',
             'image.file'=>'Vui lòng tải lại file',
        ];
    }

}
