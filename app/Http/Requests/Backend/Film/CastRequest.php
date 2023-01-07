<?php

namespace App\Http\Requests\Backend\Film;

use Illuminate\Foundation\Http\FormRequest;

class CastRequest extends FormRequest
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
            'name' => 'required|unique:cast,name|min:6|max:20'.$this->route('id'),
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên diễn viên',
            'name.unique' => 'Tên diễn viên này đã tồn tại',
        ];
    }
}
