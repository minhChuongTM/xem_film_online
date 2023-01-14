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
    public function index()
    {
        $movie = Film::all();
        foreach ($movie as $film) {
            $link_movie = $film->movie->toArray();
            
        }
        return view('admin.modules.uploadVideo.index', ['movie' => $movie]);
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
    public function edit($id)
    {
        $Movie = Movie::find($id);
        // dd($Movie->toArray());
        $film_id = Film::all();
        return view('admin.modules.uploadVideo.edit', ['Movie' => $Movie, 'film' => $film_id]);
    }
    public function update(UploadMovieRequest $request, $id)
    {
        /**move video to folder */
        $movie = Movie::findOrFail($id);
        $file = $request->link;
        // dd($file);
        if ($request->hasFile('link')) {
            if (!empty($movie['link'])) {
                unlink(public_path() . $movie->link);
            }
            $name_movie = $request->link->getClientOriginalName();
            $path = '/film/video/' . $name_movie;
            $file->move(public_path("/film/video"), $name_movie);
        }
        $data = [
            'link' => $path,
            'resolution' => $request->resolution,
            'episodes' => $request->episodes,
            'film_id' => $request->film_id
        ];
        $movie->update($data);
        return redirect()->route('admin.UploadMovie.index');
    }
    public function delete($id)
    {
        $movie = Movie::findOrFail($id);
        if (!empty($movie)) {
            if (!empty($movie->link)) {
                unlink(public_path() . $movie->link);
            }
        }
        $movie->delete();
        return redirect()->route('admin.uploadVideo.index');
    }
}
