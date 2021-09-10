<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Portfolio;
use App\Models\Experience;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $title = "Home";
        $user = DB::table('users')->first();
        $skills = Skill::all();
        $ports = Portfolio::paginate(8);
        $exps = DB::table('experiences')->orderBy('exp_date_finish', 'desc')->get();
        return view('home.index', ['title' => $title, 'user' => $user, 'skills' => $skills, 'ports' => $ports, 'exps' => $exps]);
    }
}
