<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Film\UploadMovieRequest;
use App\Models\Backend\EpisodesFormat;
use App\Models\Backend\Film;
use App\Models\Backend\Movie;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UploadMovieController extends Controller
{
    public function index() {
        $movie = Movie::all();
        $movie->movie();
        dd($movie->toArray());
        return view('admin.modules.uploadVideo.index');
    }

    public function create()
    {
        $film_id = DB::table('film')->orderBy('id', 'asc')->get();
        return view('admin.modules.uploadVideo.create', ['film_id' => $film_id]);
    }

    public function store(UploadMovieRequest $request)
    {
        /**move video to folder */
        $file = $request->link;
        // dd($file);
        $name_movie = $request->link->getClientOriginalName();
        $path = '/film/video/' . $name_movie;
        $file->move(public_path("/film/video"), $name_movie);
        
        $movie = [
            'link' => $path,
            'resolution' => $request->resolution,
            'episodes' => $request->episodes,
            'film_id' => $request->film_id
        ];
        Movie::create($movie);
        return redirect()->route('admin.UploadMovie.create');
    }
    public function edit($id) {

    }
}
