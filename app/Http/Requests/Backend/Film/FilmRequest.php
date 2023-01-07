<?php

namespace App\Http\Requests\Backend\Film;

use Illuminate\Foundation\Http\FormRequest;

class FilmRequest extends FormRequest
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
            "name_film" => "required | unique:film,name_film",
            "movie_duration" => "required",
            "nation" => "required",
            "year_of_manufacture" => "required",
            "status" => "required",
            "film_content" => "required",
            "movie_format" => "required",
            "film_style" => "required",
            "language_id" => "required",
            "film_company_id" => "required",
            "cast_id" => "required",
            "avatar" => "required | unique:film,avatar",
            "img" => "required | unique:images,img",
            
        ];
    }
    public function messages()
    {
       
        return [
            "name_film.required" => "Bạn Chưa nhập tiêu đề phim",
            "name_film.unique" => "Tên Phim này đã tồn tại",
            "nation.required" => "Bạn chưa chọn quốc gia",
            "movie_duration.required" => "Bạn chưa nhập thời lượng phim",
            "year_of_manufacture.required" => "Bạn chưa nhập năm sản xuất",
            "status.required" => "Bạn chưa nhập trạng thái của phim",
            "film_content.required" => "Bạn Chưa nhập nội dung phim",
            "movie_format.required" => "Bạn chưa chọn định dạng phim",
            "film_style.required" => "Bạn chưa chọn kiểu phim",
            "language_id.required" => "Bạn chưa chọn ngôn ngữ",
            "film_company_id.required" => "Bạn chưa chọn hãng phim",
            "cast_id.required" => "Bạn chưa chọn diễn viên",
            "avatar.required" => "Bạn chưa nhập hình ảnh đại diện của phim",
            "avatar.unique" => "Hình đại diện này đã tồn tại",
            "img.required" => "Bạn chưa nhập hình",
            "img.unique" => "Hình này đã tồn tại",
            
        ];
    }
}
