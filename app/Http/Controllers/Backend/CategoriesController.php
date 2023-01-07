<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Category\CategoriesRequest;
use App\Http\Requests\Backend\Category\FilmCompanyRequest;
use App\Http\Requests\Backend\Category\LanguageRequest;
use App\Models\Backend\Categories;
use App\Models\Backend\FilmCompany;
use App\Models\Backend\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoriesController extends Controller
{
    public function indexCategories()
    {
        $data = Categories::orderBy('id', 'asc')->get();
        return view('admin.modules.categories.index', ['categories' => $data]);
    }

    public function createCategories()
    {
        return view('admin.modules.categories.create');
    }

    public function storeCategories(CategoriesRequest $request)
    {
        // dd($request->toArray()); die;
        $categories = new Categories();
        $categories->name = $request->name;
        $categories->save();
        return redirect()->route('admin.categories.createCategories')->with('success', 'bạn đã thêm data thành công');
    }

    public function editCategories($id)
    {
        $data = Categories::where('id', $id)->first();
        return view('admin.modules.categories.edit', ['categories' => $data]);
    }

    public function updateCategories(CategoriesRequest $request, $id)
    {

        $categories = Categories::find($id); // find(tham số) => dùng để truy vấn đơn lẻ trong cơ sở dữ liệu

        $categories->name = $request->name;

        $categories->save();

        return redirect()->route('admin.categories.indexCategories');
    }

    public function deleteCategories($id)
    {
        // Categories::where('id', $id)->delete();
        $categories = Categories::findOrFail($id); //findOrFail: lấy id cần xóa
        $categories->delete();
        return redirect()->route('admin.categories.indexCategories');
    }

    // Company
    public function indexCompany()
    {
        // $company = FilmCompany::orderBy('id', 'asc')->get();
        $company = FilmCompany::all();
        return view('admin.modules.company.index', ['company' => $company]);
    }

    public function createCompany()
    {
        return view('admin.modules.company.create');
    }

    public function storeCompany(FilmCompanyRequest $request)
    {
        $company = new FilmCompany();
        $company->name = $request->name;
        $company->save();
        return redirect()->route('admin.company.createCompany')->with('success', 'Bạn đã thêm thành công hãng phim');
    }

    public function editCompany($id)
    {
        $company = FilmCompany::where('id', $id)->first();
        return view('admin.modules.company.editCompany', ['company' => $company]);
    }

    public function updateCompany(FilmCompanyRequest $request, $id)
    {
        $company = FilmCompany::find($id); // find(tham số) => dùng để truy vấn đơn lẻ trong cơ sở dữ liệu
        $company->name = $request->name;
        $company->save();
        return redirect()->route('admin.company.indexCompany');
    }

    public function deleteCompany($id)
    {
        // FilmCompany::where('id', $id)->delete();
        $filmCompany = FilmCompany::findOrFail($id); //findOrFail: lấy id cần xóa
        $filmCompany->delete();
        return redirect()->route('admin.company.indexCompany');
    }

    //LANGUAGE
    public function indexLanguage()
    {
        // $dataLanguage = Language::orderBy('id', 'asc')->get();
        $dataLanguage = Language::all();
        return view('admin.modules.languageFilm.index', ['language' => $dataLanguage]);
    }

    public function createLanguage()
    {
        return view('admin.modules.languageFilm.create');
    }

    public function storeLanguage(LanguageRequest $request)
    {
        $language = new Language();
        $language->name = $request->name;
        $language->save();
        return redirect()->route('admin.language.createLanguage')->with('success', 'Ngôn ngữ đã được thêm thành công');
    }

    public function editLanguage($id)
    {
        $language = Language::where('id', $id)->first();
        return view('admin.modules.languageFilm.edit', ['language' => $language]);
    }

    public function updateLanguage(LanguageRequest $request, $id)
    {
        $language = Language::find($id); // find(tham số) => dùng để truy vấn đơn lẻ trong cơ sở dữ liệu
        $language->name = $request->name;
        $language->save();
    }
    public function deleteLanguage($id)
    {
        // Language::where('id', $id)->delete();
        $language = Language::findOrFail($id);
        $language->delete();
        return redirect()->route('admin.language.indexLanguage');
    }

    //View List Categories
    public function viewList()
    {

        // $categories = Categories::orderBy('id', 'asc')->get();
        // $filmCompany = FilmCompany::orderBy('id', 'asc')->get();
        // $language = Language::orderBy('id', 'asc')->get();

        $categories = Categories::all();
        $filmCompany = FilmCompany::all();
        $language = Language::all();
        return view('admin.modules.viewListCategories.index', ['categories' => $categories, 'company' => $filmCompany, 'language' => $language]);
    }


    
}
