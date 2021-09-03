<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configweb;
use Illuminate\Support\Facades\DB;

class ConfigwebController extends Controller
{
    public function index()
    {
        $title = "Configuration";
        $active = 'configweb';
        $configweb = DB::table('configwebs')->first();
        return view('configweb.index', ['title' => $title, 'active' => $active, 'configweb' => $configweb]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $configweb_count = Configweb::all()->count();
        if ($request->hasFile('picture')) {
            $resorce  = $request->file('picture');
            $picture   = date("s") . '-' . $resorce->getClientOriginalName();
            $resorce->move(public_path('/images'), $picture);

            if ($configweb_count > 0) {
                $configweb = DB::table('configwebs')->first();
                $configweb = Configweb::find($configweb->id);
                if ($configweb->picture != 'default-image.jpg') {
                    unlink("images/" . $configweb->picture);
                }
                $configweb->update([
                    'profile' => $request->profile,
                    'title' => $request->title,
                    'type' => $request->type,
                    'desc' => $request->desc,
                    'url' => $request->url,
                    'site_name' => $request->site_name,
                    'metadata' => $request->metadata,
                    'keywords' => $request->keywords,
                    'developer' => $request->developer,
                    'picture' => $picture
                ]);
            } else {
                $configweb = Configweb::create([
                    'profile' => $request->profile,
                    'title' => $request->title,
                    'type' => $request->type,
                    'desc' => $request->desc,
                    'url' => $request->url,
                    'site_name' => $request->site_name,
                    'metadata' => $request->metadata,
                    'keywords' => $request->keywords,
                    'developer' => $request->developer,
                    'picture' => $picture
                ]);
            }

            if (!$configweb) {
                session()->flash('error', 'Data fail to update.');
                return redirect('/configweb');
            } else {
                session()->flash('success', 'Data success to update.');
                return redirect('/configweb');
            }
        } else {
            if ($configweb_count > 0) {
                $configweb = DB::table('configwebs')->first();
                $configweb = Configweb::find($configweb->id);
                $configweb->update([
                    'profile' => $request->profile,
                    'title' => $request->title,
                    'type' => $request->type,
                    'desc' => $request->desc,
                    'url' => $request->url,
                    'site_name' => $request->site_name,
                    'metadata' => $request->metadata,
                    'keywords' => $request->keywords,
                    'developer' => $request->developer,
                    'picture' => 'default-image.jpg'
                ]);
            } else {
                $configweb = Configweb::create([
                    'profile' => $request->profile,
                    'title' => $request->title,
                    'type' => $request->type,
                    'desc' => $request->desc,
                    'url' => $request->url,
                    'site_name' => $request->site_name,
                    'metadata' => $request->metadata,
                    'keywords' => $request->keywords,
                    'developer' => $request->developer,
                    'picture' => 'default-image.jpg'
                ]);
            }

            if (!$configweb) {
                session()->flash('error', 'Data fail to update.');
                return redirect('/configweb');
            } else {
                session()->flash('success', 'Data success to update.');
                return redirect('/configweb');
            }
        }
    }
}
