<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CertificateController extends Controller
{
    public function index()
    {
        $title = "Certificate";
        $active = 'certificate';
        $cers = Certificate::all();
        return view('cer.index', ['title' => $title, 'active' => $active, 'cers' => $cers]);
    }

    public function create()
    {
        $title = "Certificate | Add";
        $active = 'certificate';
        return view('cer.create', ['title' => $title, 'active' => $active]);
    }

    public function show($slug)
    {
        $title = "Certificate | Detail";
        $active = 'certificate';
        $cer = DB::table('certificates')->where('cer_slug', $slug)->first();
        return view('cer.detail', ['title' => $title, 'active' => $active, 'cer' => $cer]);
    }

    public function edit($slug)
    {
        $title = "Certificate | Edit";
        $active = 'certificate';
        $cer = DB::table('certificates')->where('cer_slug', $slug)->first();
        return view('cer.edit', ['title' => $title, 'active' => $active, 'cer' => $cer]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'cer_title' => 'required|unique:certificates',
            'cer_info' => 'required',
            'cer_date' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('picture')) {
            $resorce  = $request->file('picture');
            $picture   = date("s") . '-' . $resorce->getClientOriginalName();
            $resorce->move(public_path('/images'), $picture);

            $cer = Certificate::create([
                'cer_title' => $request->cer_title,
                'cer_info' => $request->cer_info,
                'cer_date' => $request->cer_date,
                'cer_slug' => Str::slug($request->cer_title),
                'picture' => $picture
            ]);

            if (!$cer) {
                session()->flash('error', 'Data fail to add.');
                return redirect('/certificate/create');
            } else {
                session()->flash('success', 'Data success to add.');
                return redirect('/certificate');
            }
        } else {

            $cer = Certificate::create([
                'cer_title' => $request->cer_title,
                'cer_info' => $request->cer_info,
                'cer_date' => $request->cer_date,
                'cer_slug' => Str::slug($request->cer_title),
                'picture' => 'default-image.jpg'
            ]);

            if (!$cer) {
                session()->flash('error', 'Data fail to add.');
                return redirect('/certificate/create');
            } else {
                session()->flash('success', 'Data success to add.');
                return redirect('/certificate');
            }
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cer_title' => 'required|unique:certificates,cer_title,' . $id,
            'cer_date' => 'required',
            'cer_info' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('picture')) {
            $resorce  = $request->file('picture');
            $picture   = date("s") . '-' . $resorce->getClientOriginalName();
            $resorce->move(public_path('/images'), $picture);

            $cer = Certificate::find($id);
            if ($cer->picture != 'default-image.jpg') {
                unlink("images/" . $cer->picture);
            }

            $cer_slug = Str::slug($request->cer_title);
            $cer->update([
                'cer_title' => $request->cer_title,
                'cer_info' => $request->cer_info,
                'cer_date' => $request->cer_date,
                'cer_slug' => $cer_slug,
                'picture' => $picture
            ]);

            if (!$cer) {
                session()->flash('error', 'Data fail to update.');
                return redirect(route('certificate.edit', $cer_slug));
            } else {
                session()->flash('success', 'Data success to update.');
                return redirect(route('certificate.show', $cer_slug));
            }
        } else {
            $cer = Certificate::find($id);
            $cer_slug = Str::slug($request->cer_title);
            $cer->update([
                'cer_title' => $request->cer_title,
                'cer_info' => $request->cer_info,
                'cer_date' => $request->cer_date,
                'cer_slug' => $cer_slug
            ]);

            if (!$cer) {
                session()->flash('error', 'Data fail to update.');
                return redirect(route('certificate.edit', $cer_slug));
            } else {
                session()->flash('success', 'Data success to update.');
                return redirect(route('certificate.show', $cer_slug));
            }
        }
    }

    public function destroy($id)
    {
        $cer = Certificate::find($id);
        if ($cer->picture != 'default-image.jpg') {
            unlink("images/" . $cer->picture);
        }
        $cer->delete();

        if (!$cer) {
            session()->flash('error', 'Data fail to delete.');
            return redirect('/certificate');
        } else {
            session()->flash('success', 'Data success to delete');
            return redirect('/certificate');
        }
    }
}
