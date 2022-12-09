<?php

namespace App\Http\Controllers;

use App\Models\Skills\Skill;
use App\Models\Queens\Queen;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QueenController extends Controller
{
    public function index() {
        $queens = Queen::orderBy('name')->get();
        return Inertia::render('Queens/Index',[
            'queens' => $queens
        ]);
    }

    public function create(Request $request) {
        $token = $request->session()->token();
        $skills = Skill::orderBy('name')->get();
        return Inertia::render('Queens/Create',['token'=>$token,'skills'=>$skills]);
    }

    public function store(Request $request) {
        $user = Auth::user();
        $data = $request->all();
        $queen = Queen::create([
            'name' => $data['name'],
            'user_id' => $user->id,
            'image_url' => $data['image_url'],
        ]);

        foreach($data['skills'] AS $k => $v) {
            $queen->skills()->create([
                'skill_id' => $k,
                'value' => $v
            ]);
        }

        return redirect()->route('queens/index')->banner('Queen created.');
    }

    public function edit(Request $request,Queen $queen) {
        $token = $request->session()->token();
        $skills = Skill::orderBy('name')->get();
        return Inertia::render('Queens/Edit',['token'=>$token,'queen'=>$queen,'skills'=>$skills]);
    }

    public function update(Request $request,Queen $queen) {
        $data = $request->all();
        $queen->update($data);
        return redirect()->route('queens/index')->banner('Queen updated.');
    }

    public function delete(Request $request,Queen $queen) {
        $queen->delete();
        return redirect()->route('queens/index')->banner('Queen deleted.');
    }


}
