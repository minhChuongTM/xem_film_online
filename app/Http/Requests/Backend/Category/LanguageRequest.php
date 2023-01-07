<?php

namespace App\Http\Requests\Backend\Category;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:language,name'. $this->route('id'), 
        ];
    }

    public function messages()
    {
        return [
            'name.required'=> 'Bạn chưa nhập tên ngôn ngữ',
            'name.unique'=> 'Ngôn ngữ này đã tồn tại'
        ];
    }
}
