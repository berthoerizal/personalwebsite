<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Portfolio;
use Illuminate\Support\Facades\DB;

class PortfolioController extends Controller
{
    public function index()
    {
        $title = "Portfolio";
        $active = 'portfolio';
        $ports = Portfolio::all();

        return view('portfolio.index', ['title' => $title, 'active' => $active, 'ports' => $ports]);
    }

    public function create()
    {
        $title = "Portfolio | Add";
        $active = 'portfolio';
        return view('portfolio.create', ['title' => $title, 'active' => $active]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'port_title' => 'required|unique:portfolios',
            'port_date' => 'required',
            'port_info' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('picture')) {
            $resorce  = $request->file('picture');
            $picture   = date("s") . '-' . $resorce->getClientOriginalName();
            $resorce->move(public_path('/images'), $picture);

            $port = Portfolio::create([
                'port_title' => $request->port_title,
                'port_date' => $request->port_date,
                'port_info' => $request->port_info,
                'port_slug' => Str::slug($request->port_title),
                'picture' => $picture
            ]);

            if (!$port) {
                session()->flash('error', 'Data fail to add.');
                return redirect('/portfolio/create');
            } else {
                session()->flash('success', 'Data success to add.');
                return redirect('/portfolio');
            }
        } else {

            $port = Portfolio::create([
                'port_title' => $request->port_title,
                'port_date' => $request->port_date,
                'port_info' => $request->port_info,
                'port_slug' => Str::slug($request->port_title)
            ]);

            if (!$port) {
                session()->flash('error', 'Data fail to add.');
                return redirect('/portfolio/create');
            } else {
                session()->flash('success', 'Data success to add.');
                return redirect('/portfolio');
            }
        }
    }

    public function edit($slug)
    {
        $title = "Portfolio | Edit";
        $active = 'portfolio';
        $port = DB::table('portfolios')->where('port_slug', $slug)->first();
        return view('portfolio.edit', ['title' => $title, 'active' => $active, 'port' => $port]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'port_title' => 'required|unique:portfolios,port_title,' . $id,
            'port_date' => 'required',
            'port_info' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('picture')) {
            $resorce  = $request->file('picture');
            $picture   = date("s") . '-' . $resorce->getClientOriginalName();
            $resorce->move(public_path('/images'), $picture);

            $port = Portfolio::find($id);
            if ($port->picture != 'default-image.jpg') {
                unlink("images/" . $port->picture);
            }

            $port_slug = Str::slug($request->port_title);
            $port->update([
                'port_title' => $request->port_title,
                'port_date' => $request->port_date,
                'port_info' => $request->port_info,
                'port_slug' => $port_slug,
                'picture' => $picture
            ]);

            if (!$port) {
                session()->flash('error', 'Data fail to update.');
                return redirect(route('portfolio.edit', $port_slug));
            } else {
                session()->flash('success', 'Data success to update.');
                return redirect(route('portfolio.show', $port_slug));
            }
        } else {
            $port = Portfolio::find($id);
            $port_slug = Str::slug($request->port_title);
            $port->update([
                'port_title' => $request->port_title,
                'port_date' => $request->port_date,
                'port_info' => $request->port_info,
                'port_slug' => $port_slug
            ]);

            if (!$port) {
                session()->flash('error', 'Data fail to update.');
                return redirect(route('portfolio.edit', $port_slug));
            } else {
                session()->flash('success', 'Data success to update.');
                return redirect(route('portfolio.show', $port_slug));
            }
        }
    }

    public function show($slug)
    {
        $title = "Portfolio | Detail";
        $active = 'portfolio';
        $port = DB::table('portfolios')->where('port_slug', $slug)->first();
        return view('portfolio.detail', ['title' => $title, 'active' => $active, 'port' => $port]);
    }

    public function destroy($id)
    {
        $port = Portfolio::find($id);

        if ($port->picture != 'default-image.jpg') {
            unlink("images/" . $port->picture);
        }
        $port->delete();

        if (!$port) {
            session()->flash('error', 'Data fail to delete.');
            return redirect('/portfolio');
        } else {
            session()->flash('success', 'Data success to delete.');
            return redirect('/portfolio');
        }
    }
}
