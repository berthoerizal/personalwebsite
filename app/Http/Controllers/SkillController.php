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
            'skill_title' => 'required'
        ]);

        $skill = Skill::create([
            'skill_title' => $request->skill_title
        ]);

        if (!$skill) {
            session()->flash('error', 'Data fail to add.');
            return redirect('/skill');
        } else {
            session()->flash('success', 'Data success to add.');
            return redirect('/skill');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'skill_title' => 'required'
        ]);

        $skill = Skill::find($id);
        $skill->update([
            'skill_title' => $request->skill_title
        ]);

        if (!$skill) {
            session()->flash('error', 'Data fail to update.');
            return redirect('/skill');
        } else {
            session()->flash('success', 'Data success to update.');
            return redirect('/skill');
        }
    }

    public function destroy($id)
    {
        $skill = Skill::find($id);
        $skill->delete();

        if (!$skill) {
            session()->flash('error', 'Data fail to delete.');
            return redirect('/skill');
        } else {
            session()->flash('success', 'Data success to delete.');
            return redirect('/skill');
        }
    }
}
