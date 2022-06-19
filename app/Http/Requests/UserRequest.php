<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email',
            'o[]'=>'required',
            'status'=>'required',
            'password'=>'required',

        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'لطفا نام کاربر را وارد کنید',
            'email.required'=>'لطفا ایمیل کاربر را وارد کنید',
            'o[].required'=>'لطفا نقشهای کاربر را وارد کنید',
            'status.required'=>'لطفا وضعیت کاربر را مشخص کنید',
            'password.required'=>'لطفا رمز ورود کاربر را وارد کنید',
        ];
    }
}
