<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $title = "Skill";
        $active = 'skill';
        return view('skill.index', ['title' => $title, 'active' => $active]);
    }
}
