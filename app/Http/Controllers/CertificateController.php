<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;

class CertificateController extends Controller
{
    public function index()
    {
        $title = "Certificate";
        $active = 'certificate';
        $cers = Certificate::all();
        return view('cer.index', ['title' => $title, 'active' => $active, 'cers' => $cers]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'cer_title' => 'required',
            'cer_info' => 'required',
            'cer_date' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('picture')) {
            $resorce  = $request->file('picture');
            $picture   = date("s") . '-' . $resorce->getClientOriginalName();
            $resorce->move(public_path('/images'), $picture);

            $cer = Certificate::create([
                'cer_title' => $request->cer_title,
                'cer_info' => $request->cer_info,
                'cer_date' => $request->cer_date,
                'picture' => $picture
            ]);

            if (!$cer) {
                session()->flash('error', 'Data fail to add.');
                return redirect('/certificate');
            } else {
                session()->flash('success', 'Data success to add.');
                return redirect('/certificate');
            }
        } else {

            $cer = Certificate::create([
                'cer_title' => $request->cer_title,
                'cer_info' => $request->cer_info,
                'cer_date' => $request->cer_date,
                'picture' => 'default-image.JPG'
            ]);

            if (!$cer) {
                session()->flash('error', 'Data fail to add.');
                return redirect('/certificate');
            } else {
                session()->flash('success', 'Data success to add.');
                return redirect('/certificate');
            }
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cer_title' => 'required',
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

            $cer->update([
                'cer_title' => $request->cer_title,
                'cer_info' => $request->cer_info,
                'cer_date' => $request->cer_date,
                'picture' => $picture
            ]);

            if (!$cer) {
                session()->flash('error', 'Data fail to update.');
                return redirect('/certificate');
            } else {
                session()->flash('success', 'Data success to update.');
                return redirect('/certificate');
            }
        } else {
            $cer = Certificate::find($id);
            $cer->update([
                'cer_title' => $request->cer_title,
                'cer_info' => $request->cer_info,
                'cer_date' => $request->cer_date
            ]);

            if (!$cer) {
                session()->flash('error', 'Data fail to update.');
                return redirect('/certificate');
            } else {
                session()->flash('success', 'Data success to update.');
                return redirect('/certificate');
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
