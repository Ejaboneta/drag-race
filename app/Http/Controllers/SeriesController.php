<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Inertia\Inertia;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{
    public function index() {
        $series = Series::orderBy('name')->get();
        return Inertia::render('Series/Index',[
            'series' => $series
        ]);
    }

    public function create(Request $request) {
        $token = $request->session()->token();
        return Inertia::render('Series/Create',['token'=>$token]);
    }

    public function store(Request $request) {
        $user = Auth::user();
        $data = $request->all();
        $series = Series::create([
            'name' => $data['name'],
            'user_id' => $user->id,
        ]);

        return redirect()->route('series/index')->banner('Series created.');
    }

    public function edit(Request $request,Series $series) {
        $token = $request->session()->token();
        return Inertia::render('Series/Edit',['token'=>$token,'series'=>$series]);
    }

    public function update(Request $request,Series $series) {
        $data = $request->all();
        $series->update($data);
        return redirect()->route('series/index')->banner('Series updated.');
    }

    public function delete(Request $request,Series $series) {
        $series->delete();
        return redirect()->route('series/index')->banner('Series deleted.');
    }

}
