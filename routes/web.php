<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\AddFilmController;
use App\Http\Controllers\Backend\CastController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\UploadMovieController;
use App\Http\Controllers\EpisodesFormatController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



/** Login/Logout **/
Route::get('admin/login', [LoginController::class, 'displayLogin'])->name('login');
Route::post('admin/login', [LoginController::class, 'login'])->name('login');
Route::get('admin/logout', [LoginController::class, 'logout'])->name('logout');



Route::middleware(['check_login_admin'])->group(function () {
    Route::get('admin/dashboard', function () {
        return view('admin.modules.dashboard.index');
    })->name('admin.dashboard');

    // View list
    Route::get('viewListCategories', [CategoriesController::class, 'viewList'])->name('viewListCategories');

    Route::prefix('admin')->name('admin.')->group(function () {
        
        //CATEGORIES
        Route::prefix('categories')->controller(CategoriesController::class)->name('categories.')->group(function () {
            Route::get('indexCategories', 'indexCategories')->name('indexCategories');
            Route::get('createCategories', 'createCategories')->name('createCategories');
            Route::post('storeCategories', 'storeCategories')->name('storeCategories');
            Route::get('editCategories/{id}', 'editCategories')->name('editCategories');
            Route::post('updateCategories/{id}', 'updateCategories')->name('updateCategories');
            Route::get('deleteCategories/{id}', 'deleteCategories')->name('deleteCategories');
        });

        //FILM_COMPANY
        Route::prefix('company')->controller(CategoriesController::class)->name('company.')->group(function () {
            Route::get('indexCompany', 'indexCompany')->name('indexCompany');
            Route::get('createCompany', 'createCompany')->name('createCompany');
            Route::post('storeCompany', 'storeCompany')->name('storeCompany');
            Route::get('editCompany/{id}', 'editCompany')->name('editCompany');
            Route::post('updateCompany/{id}', 'updateCompany')->name('updateCompany');
            Route::get('deleteCompany/{id}', 'deleteCompany')->name('deleteCompany');
        });

        //FILM_LANGUAGE
        Route::prefix('language')->controller(CategoriesController::class)->name('language.')->group(function () {
            Route::get('indexLanguage', 'indexLanguage')->name('indexLanguage');
            Route::get('createLanguage', 'createLanguage')->name('createLanguage');
            Route::post('storeLanguage', 'storeLanguage')->name('storeLanguage');
            Route::get('editLanguage/{id}', 'editLanguage')->name('editLanguage');
            Route::post('updateLanguage/{id}', 'updateLanguage')->name('updateLanguage');
            Route::get('deleteLanguage/{id}', 'deleteLanguage')->name('deleteLanguage');
        });

        //FILM
        Route::prefix('film')->controller(AddFilmController::class)->name('film.')->group(function () {
            Route::get('indexFilm', 'indexFilm')->name('indexFilm');
            Route::get('createFilm', 'createFilm')->name('createFilm');
            Route::post('storeFilm', 'storeFilm')->name('storeFilm');
            Route::get('editFilm/{id}', 'editFilm')->name('editFilm');
            Route::put('updateFilm/{id}', 'updateFilm')->name('updateFilm');
            Route::get('deleteFilm/{id}', 'deleteFilm')->name('deleteFilm');
        });

        //Cast
        Route::prefix('cast')->controller(CastController::class)->name('cast.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}', 'update')->name('update');
            Route::get('delete/{id}', 'delete')->name('delete');
        });

        /**Upload movie */
        Route::prefix('UploadMovie')->controller(UploadMovieController::class)->name('UploadMovie.')->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}', 'update')->name('update');
            Route::get('delete/{id}', 'delete')->name('delete');
        });
    });
});
