<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'status'=>'required',
            //'o[]'=>'required',
            'password'=>'required|size:8',
        ];
    }
}
//$2y$10$AqttlK..0oiI7heKwu/tReHwBmXsi.36kjqaAyGu3.Bm7HaEU7nuu
//$2y$10$BFZUQSTpCzQHuFETQTg71OdX1k6BT8ImxZWuEKK2QJtKuzTljk0P.
