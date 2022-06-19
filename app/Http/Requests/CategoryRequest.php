<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
    protected function prepareForValidation()
    {
        if($this->slug)
        {
            $this->merge(['slug' => make_slug($this->slug)]);
        }
        else
        {
            $this->merge(['slug' => make_slug($this->title)]);
        }
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'slug' =>Rule::unique('categories')->ignore(request()->Category),
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'لطفا عنوان مطلب را وارد کنید',
            'slug.unique' => 'این نام مستعار قبلا ثبت شده است',
        ];
    }
}
