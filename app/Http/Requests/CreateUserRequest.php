<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name'=>[
                'bail',
                'required',
                'min:2',
                'max:200'
            ],
            'email'=>[
                'bail',
                'required',
                'email:rfc',
                'unique:App\User,email'
            ],
            'password'=>[
                'bail',
                'required',
                'min:6',
                'max:16'
            ],
            'password_confirm'=>[
                'bail',
                'required',
                'same:password'
            ],
            'role'=>[
                'bail',
                'required',
                'numeric',
                'min:0',
                'max:1',
            ]
        ];
    }

    public function messages(){
        return [
            'name.required'=>"không được để trống!",
            'name.min'=>"Độ dài từ 2-200 kí tự!",
            'name.max'=>"Độ dài từ 2-200 kí tự!",
            'email.required'=>"không được để trống!",
            'email.email'=>"Sai định dạng email!",
            'email.unique'=>"Email này đã được sử dụng",
            'password.required'=>"không được để trống!",
            'password.min'=>"Độ dài từ 6-16 kí tự",
            'password.max'=>"Độ dài từ 6-16 kí tự",
            'password_confirm.required'=>"không được để trống!",
            'password_confirm.same'=>"Mật khẩu nhập lại chưa khớp!",
            
        ];
    }
}
