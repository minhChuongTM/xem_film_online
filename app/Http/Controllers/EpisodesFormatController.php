<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EpisodesFormatController extends Controller
{
    public function create()
    {
        return view("episodesFormat");
    }
    public function store(Request $request)
    {

        $data = $request->episodes_number;
        for ($i = 1; $i < $data; $i++) {
            $nb = [
               'episodes_number' => $i
            ];
            // var_dump($nb);
            DB::table('episodes_format')->insert($nb);
        }


        return redirect()->route('admin.episodes.create');
    }
}
