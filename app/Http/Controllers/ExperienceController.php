<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function index()
    {
        $title = "Experience";
        $active = 'experience';
        $exps = Experience::all();
        return view('experience.index', ['title' => $title, 'active' => $active, 'exps' => $exps]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'exp_title' => 'required',
            'exp_info' => 'required',
            'exp_date_start' => 'required',
            'exp_date_finish' => 'required'
        ]);

        $exp = Experience::create([
            'exp_title' => $request->exp_title,
            'exp_info' => $request->exp_info,
            'exp_date_start' => $request->exp_date_start,
            'exp_date_finish' => $request->exp_date_finish
        ]);

        if (!$exp) {
            session()->flash('error', 'Data fail to add.');
            return redirect('/experience');
        } else {
            session()->flash('success', 'Data success to add.');
            return redirect('/experience');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'exp_title' => 'required',
            'exp_info' => 'required',
            'exp_date_start' => 'required',
            'exp_date_finish' => 'required'
        ]);

        $exp = Experience::find($id);
        $exp->update([
            'exp_title' => $request->exp_title,
            'exp_info' => $request->exp_info,
            'exp_date_start' => $request->exp_date_start,
            'exp_date_finish' => $request->exp_date_finish
        ]);

        if (!$exp) {
            session()->flash('error', 'Data fail to update.');
            return redirect('/experience');
        } else {
            session()->flash('success', 'Data success to update.');
            return redirect('/experience');
        }
    }

    public function destroy($id)
    {
        $exp = Experience::find($id);
        $exp->delete();
        if (!$exp) {
            session()->flash('error', 'Data fail to delete.');
            return redirect('/experience');
        } else {
            session()->flash('success', 'Data success to delete.');
            return redirect('/experience');
        }
    }
}
