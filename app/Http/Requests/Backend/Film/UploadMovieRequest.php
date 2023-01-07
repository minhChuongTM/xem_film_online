<?php

namespace App\Http\Requests\Backend\Film;

use Illuminate\Foundation\Http\FormRequest;

class UploadMovieRequest extends FormRequest
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
            'link' => 'required | unique:movie,link',
            'resolution' => 'required',
            'episodes' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'link.required'=>'video này đã tồn tại',
            'resolution.required'=>'Bạn chưa nhập độ phân giải',
            'episodes.required' => 'Bạn chưa nhập số tập cho phim'
        ];
    }
}
