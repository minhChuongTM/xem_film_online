<?php

namespace App\Http\Requests\Backend\Category;

use Illuminate\Foundation\Http\FormRequest;

class FilmCompanyRequest extends FormRequest
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
            'name' => 'required|unique:film_company,name'.$this->route('id'), 
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bạn đã thêm thành thành công hãng phim',
            'name.unique' => 'Tên hãng phim này đã tồn tại',
        ];
    }
}
