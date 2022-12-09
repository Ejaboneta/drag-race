<?php

namespace App\Http\Controllers;

use App\Models\Queens\Queen;
use App\Models\Seasons\Season;
use App\Models\Series;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeasonController extends Controller
{
    public function index() {
        $seasons = Season::orderBy('name')->with(['series'])->get();
        return Inertia::render('Seasons/Index',[
            'seasons' => $seasons
        ]);
    }

    public function create(Request $request) {
        $token = $request->session()->token();
        $series = Series::orderBy('name')->withCount(['seasons'])->get();
        $queens = Queen::all();
        return Inertia::render('Seasons/Create',['token'=>$token,'series'=>$series,'queens'=>$queens]);
    }

    public function store(Request $request) {
        $user = Auth::user();
        $data = $request->all();
        $season = Season::create([
            'name' => "Season $data[season_number]",
            'series_id' => $data['series_id'],
            'user_id' => $user->id,
        ]);

        return redirect()->route('seasons/index')->banner('Season created.');
    }

    public function edit(Request $request,Season $season) {
        $token = $request->session()->token();
        $season->load('queens');
        $queens = Queen::whereNotIn('id',$season->queens->pluck('queen_id'))->get();
        return Inertia::render('Seasons/Edit',['token'=>$token,'season'=>$season,'queens'=>$queens]);
    }

    public function update(Request $request,Season $season) {
        $data = $request->all();
        $season->update($data);
        return redirect()->route('seasons/index')->banner('Season updated.');
    }

    public function addQueen(Season $season, Request $request) {
        $season->queens()->create(['queen_id'=>$request->input('queen_id')]);
        return response()->json('Added.');
    }

    public function delete(Request $request,Season $season) {
        $season->delete();
        return redirect()->route('seasons/index')->banner('Season deleted.');
    }

}
