<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $title = "Post";
        $active = 'post';
        $posts = Post::all();
        return view('post.index', ['title' => $title, 'active' => $active, 'posts' => $posts]);
    }

    public function create()
    {
        $title = "Post | Add";
        $active = 'post';
        return view('post.create', ['title' => $title, 'active' => $active]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_title' => 'required|unique:posts',
            'post_info' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('picture')) {
            $resorce  = $request->file('picture');
            $picture   = date("s") . '-' . $resorce->getClientOriginalName();
            $resorce->move(public_path('/images'), $picture);

            $post = Post::create([
                'post_title' => $request->post_title,
                'post_info' => $request->post_info,
                'post_slug' => Str::slug($request->post_title),
                'picture' => $picture
            ]);

            if (!$post) {
                session()->flash('error', 'Data fail to add.');
                return redirect('/post/create');
            } else {
                session()->flash('success', 'Data success to add.');
                return redirect('/post');
            }
        } else {

            $post = Post::create([
                'post_title' => $request->post_title,
                'post_info' => $request->post_info,
                'post_slug' => Str::slug($request->post_title),
                'picture' => 'default-image.jpg'
            ]);

            if (!$post) {
                session()->flash('error', 'Data fail to add.');
                return redirect('/post/create');
            } else {
                session()->flash('success', 'Data success to add.');
                return redirect('/post');
            }
        }
    }

    public function show($slug)
    {
        $title = "Post | Detail";
        $active = 'post';
        $post = DB::table('posts')->where('post_slug', $slug)->first();
        return view('post.detail', ['title' => $title, 'active' => $active, 'post' => $post]);
    }

    public function edit($slug)
    {
        $title = "Post | Edit";
        $active = 'post';
        $post = DB::table('posts')->where('post_slug', $slug)->first();
        return view('post.edit', ['title' => $title, 'active' => $active, 'post' => $post]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'post_title' => 'required|unique:posts,post_title,' . $id,
            'post_info' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('picture')) {
            $resorce  = $request->file('picture');
            $picture   = date("s") . '-' . $resorce->getClientOriginalName();
            $resorce->move(public_path('/images'), $picture);

            $post = Post::find($id);
            if ($post->picture != 'default-image.jpg') {
                unlink("images/" . $post->picture);
            }

            $post_slug = Str::slug($request->post_title);
            $post->update([
                'post_title' => $request->post_title,
                'post_info' => $request->post_info,
                'post_slug' => $post_slug,
                'picture' => $picture
            ]);

            if (!$post) {
                session()->flash('error', 'Data fail to update.');
                return redirect(route('post.edit', $post_slug));
            } else {
                session()->flash('success', 'Data success to update.');
                return redirect(route('post.show', $post_slug));
            }
        } else {
            $post = Post::find($id);
            $post_slug = Str::slug($request->post_title);
            $post->update([
                'post_title' => $request->post_title,
                'post_info' => $request->post_info,
                'post_slug' => $post_slug
            ]);

            if (!$post) {
                session()->flash('error', 'Data fail to update.');
                return redirect(route('post.edit', $post_slug));
            } else {
                session()->flash('success', 'Data success to update.');
                return redirect(route('post.show', $post_slug));
            }
        }
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post->picture != 'default-image.jpg') {
            unlink('images/' . $post->picture);
        }
        $post->delete();

        if (!$post) {
            session()->flash('error', 'Data fail to delete.');
            return redirect('/post');
        } else {
            session()->flash('success', 'Data success to delete.');
            return redirect('post');
        }
    }
}
