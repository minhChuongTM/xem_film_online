<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Film\CastRequest;
use App\Models\Backend\Cast;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CastController extends Controller
{
    public function index()
    {
        $data = DB::table('cast')->orderBy('id', 'asc')->get();
        return view('admin.modules.cast.index', ['cast'=> $data]);
    }

    public function create()
    {
        return view('admin.modules.cast.create');
    }

    public function store(CastRequest $request)
    {
        $data = new Cast();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('admin.cast.create')->with('success', 'Diễn viên đã được thêm thành công');
    }

    public function edit($id)
    {
        $data['cast'] = DB::table('cast')->where('id', $id)->first();
        return view('admin.modules.cast.edit', $data);
    }

    public function update(CastRequest $request, $id)
    {
        $data = $request->except('_token');
        $data['created_at'] = new DateTime();
        DB::table('cast')->where('id', $id)->update($data);
        return redirect()->route('admin.cast.index');
    }
    public function delete($id)
    {
        DB::table('cast')->where('id', $id)->delete();
        return redirect()->route('admin.cast.index');
    }
}
