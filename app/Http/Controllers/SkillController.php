<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    public function index()
    {
        $title = "Skill";
        $active = 'skill';
        $skills = Skill::all();
        return view('skill.index', ['title' => $title, 'active' => $active, 'skills' => $skills]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'skill_title' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('picture')) {
            $resorce  = $request->file('picture');
            $picture   = $resorce->getClientOriginalName();
            $resorce->move(public_path('/images'), $picture);

            $skill = Skill::create([
                'skill_title' => $request->skill_title,
                'picture' => $picture
            ]);

            if (!$skill) {
                session()->flash('error', 'Data fail to add.');
                return redirect('/skill');
            } else {
                session()->flash('success', 'Data success to add.');
                return redirect('/skill');
            }
        } else {

            $skill = Skill::create([
                'skill_title' => $request->skill_title,
                'picture' => 'default-image.jpg',
            ]);

            if (!$skill) {
                session()->flash('error', 'Data fail to add.');
                return redirect('/skill');
            } else {
                session()->flash('success', 'Data success to add.');
                return redirect('/skill');
            }
        }
    }
}
