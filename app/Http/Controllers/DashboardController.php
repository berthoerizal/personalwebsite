<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Portfolio;
use App\Models\Experience;
use App\Models\Certificate;

class DashboardController extends Controller
{
    public function index()
    {
        $title = "Dashboard";
        $active = 'dashboard';
        $post_count = Post::all()->count();
        $port_count = Portfolio::all()->count();
        $exp_count = Experience::all()->count();
        $cer_count = Certificate::all()->count();
        $posts = Post::latest()->paginate(2);
        return view('dashboard.index', ['title' => $title, 'active' => $active, 'post_count' => $post_count, 'port_count' => $port_count, 'exp_count' => $exp_count, 'cer_count' => $cer_count, 'posts' => $posts]);
    }
}
