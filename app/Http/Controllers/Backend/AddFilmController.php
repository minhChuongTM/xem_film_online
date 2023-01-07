<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Film\FilmRequest;
use App\Http\Requests\Backend\Film\UpdateFilmRequest;
use App\Models\Backend\Cast;
use App\Models\Backend\Categories;
use App\Models\Backend\Film;
use App\Models\Backend\FilmCategory;
use App\Models\Backend\FilmCompany;
use App\Models\Backend\Images;
use App\Models\Backend\Language;
use DateTime;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AddFilmController extends Controller
{
    /**Cast */
    public function indexFilm()
    {
        $films = Film::all();

        foreach ($films as $film) {
            $categories = $film->categories->toArray();
            $film->categoriesStr = '';
            $casts = $film->cast->toArray();
            $film->castStr = '';
            foreach ($categories as $category) {
                $film->categoriesStr .= ', ' . $category['name'];
            }
            $film->categoriesStr = substr($film->categoriesStr, 2);
            foreach ($casts as $cast) {
                $film->castStr .= ', ' . $cast['name'];
            }
            $film->castStr = substr($film->castStr, 2);
        }

        // dd($films->toArray());
        return view('admin.modules.addFilm.index', ['film' => $films]);
    }

    public function createFilm()
    {
        $categories = Categories::all();
        $company = FilmCompany::all();
        $language = Language::all();
        $cast = Cast::all();
        return view('admin.modules.addFilm.createFilm', [
            'categories_id' => $categories,
            'company_id' => $company, 'language_id' => $language, 'cast' => $cast
        ]);
    }

    public function storeFilm(FilmRequest $request)
    {
        // dd($request->hasFile('avatar'));
        // move image to folder
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $avatar = $request->avatar->getClientOriginalName();
            $pathAvatar = '/film/img/' . $avatar;
            $file->move(public_path('/film/img'), $avatar);
        }

        // dd($avatar);
        // create film 
        $data = [
            'name_film' => $request->name_film,
            'movie_duration' => $request->movie_duration,
            'nation' => $request->nation,
            'year_of_manufacture' => $request->year_of_manufacture,
            'status' => $request->status,
            'film_content' => $request->film_content,
            'movie_format' => $request->movie_format,
            'film_style' => $request->film_style,
            'avatar' => $pathAvatar,
            'language_id' => $request->language_id,
            'film_company_id' => $request->film_company_id,
            'film_style' => implode(", ", $request->film_style),
            'created_at' => new DateTime(),
            'year_of_manufacture' => date_format(date_create_from_format('d-m-Y', $request->year_of_manufacture), 'Y-m-d'),
        ];
        // dd($data);
        $film = Film::create($data);
        $film_id = DB::getPdo()->lastInsertId();
        $film->categories()->attach($request->categories_id);

        //Insert into table Cast_in_film
        $film->cast()->attach($request->cast_id);

        /**Image */
        if ($request->hasFile('img')) {
            $banner = $request->img;
            $nameIg = $request->img->getClientOriginalName();
            $pathBanner = '/film/img/' . $nameIg;
            $banner->move(public_path('/film/img'), $nameIg);
        }

        // $film->images()->attach($pathBanner);
        $file_ig = [
            'img' => $pathBanner,
            'film_id' => $film_id
        ];
        Images::create($file_ig);
        return redirect()->route('admin.UploadMovie.create');
    }

    public function editFilm($id)
    {

        $film = Film::find($id);
        $film->categories = $film->categories->toArray();
        $film->cast = $film->cast->toArray();
        //table Images
        $film->images->toArray();
        // dd($film->toArray());
        $categories = Categories::all();
        $company = FilmCompany::all();
        $casts = Cast::all();
        $language = Language::all();
        return view('admin.modules.addFilm.editFilm', [
            'film' => $film, 'categories' => $categories,
            'company' => $company, 'cast' => $casts, 'language' => $language
        ]);
    }

    public function updateFilm(UpdateFilmRequest $request, $id)
    {
        $film = Film::find($id);
        //    dd($film->avatar);
        $file = $request->avatar;
        if (!empty($file)) {
            if (!empty($film->avatar)) {
                unlink(public_path() . $film->avatar); //Hàm unlink() sẽ xóa file dựa vào đường dẫn đã truyền vào.
            }
            $avatar = $request->avatar->getClientOriginalName();
            $pathAvatar = '/film/img/' . $avatar;
            $file->move(public_path('/film/img'), $avatar);
        }
        //  dd($film->toArray());
        $data = [
            'name_film' => $request->name_film,
            'movie_duration' => $request->movie_duration,
            'nation' => $request->nation,
            'year_of_manufacture' => $request->year_of_manufacture,
            'status' => $request->status,
            'film_content' => $request->film_content,
            'movie_format' => $request->movie_format,
            'film_style' => $request->film_style,
            'avatar' => $pathAvatar,
            'language_id' => $request->language_id,
            'film_company_id' => $request->film_company_id,
            'film_style' => implode(", ", $request->film_style),
            'created_at' => new DateTime(),
            'year_of_manufacture' => date_format(date_create_from_format('d-m-Y', $request->year_of_manufacture), 'Y-m-d'),
        ];
        //  dd($data);
        $film->update($data);
        //update film_categories
        $film->categories()->sync($request->categories_id); //snyc: update data in ORM laravel
        //Update cast_in_film
        $film->cast()->sync($request->cast_id);

        /**Image */
        // $film->images->toArray();
        $banner = $request->img;
        if ($request->hasFile('img')) {
            if (!empty($film->images['img'])) {
                unlink(public_path() . $film->images['img']);
            }
            $nameIg = $request->img->getClientOriginalName();
            $pathBanner = '/film/img/' . $nameIg;
            $banner->move(public_path('/film/img'), $nameIg);
        }

        // $film->images()->attach($pathBanner);
        $file_ig = [
            'img' => $pathBanner,
        ];
        $film->images()->update($file_ig);

        return redirect()->route('admin.film.indexFilm');
    }

    public function deleteFilm($id)
    {
        $film = Film::findOrFail($id);
        $film->Categories()->sync([]); // delete bảng nhiều nhiều
        $film->cast()->sync([]);// delete bảng nhiều nhiều
        // dd($film->filmCategories());
        if (!empty($film)) {    
            if (!empty($film->avatar)) {
                unlink(public_path() . $film->avatar); //Hàm unlink() sẽ xóa file dựa vào đường dẫn đã truyền vào.
            }
        }
        if (!empty($film)) {
            if (!empty($film->images['img'])) {
                unlink(public_path() . $film->images['img']);
                $film->images()->delete(); // delete bảng 1: nhiều and 1:1
            }
        }
        $film->delete();
        return redirect()->route('admin.film.indexFilm');
    }
}
