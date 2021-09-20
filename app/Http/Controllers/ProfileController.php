<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = User::find(Auth()->user()->id);
        $title = "Profile";
        $active = 'profile';
        return view('profile.index', ['title' => $title, 'active' => $active, 'profile' => $profile]);
    }

    public function update(Request $request, $id)
    {
        $profile = User::find(Auth()->user()->id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users,email,' . $profile->id,
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('picture')) {
            $resorce  = $request->file('picture');
            $picture   = date("s") . '-' . $resorce->getClientOriginalName();
            $resorce->move(public_path('/images'), $picture);

            if ($profile->picture != 'profiledefault.png') {
                unlink("images/" . $profile->picture);
            }

            $profile->update([
                'name' => $request->name,
                'email' => $request->email,
                'birthday' => $request->birthday,
                'address' => $request->address,
                'googlemap' => $request->googlemap,
                'phone' => $request->phone,
                'about' => $request->about,
                'education' => $request->education,
                'edu_date_start' => $request->edu_date_start,
                'edu_date_finish' => $request->edu_date_finish,
                'job' => $request->job,
                'akun_fb' => $request->akun_fb,
                'akun_git' => $request->akun_git,
                'akun_linkedin' => $request->akun_linkedin,
                'picture' => $picture
            ]);

            if (!$profile) {
                session()->flash('error', 'Data fail to update.');
                return redirect('/profile');
            } else {
                session()->flash('success', 'Data success to update.');
                return redirect('/profile');
            }
        } else {
            $profile->update([
                'name' => $request->name,
                'email' => $request->email,
                'birthday' => $request->birthday,
                'address' => $request->address,
                'googlemap' => $request->googlemap,
                'phone' => $request->phone,
                'about' => $request->about,
                'education' => $request->education,
                'edu_date_start' => $request->edu_date_start,
                'edu_date_finish' => $request->edu_date_finish,
                'akun_fb' => $request->akun_fb,
                'akun_git' => $request->akun_git,
                'akun_linkedin' => $request->akun_linkedin,
                'job' => $request->job
            ]);

            if (!$profile) {
                session()->flash('error', 'Data fail to update.');
                return redirect('/profile');
            } else {
                session()->flash('success', 'Data success to update.');
                return redirect('/profile');
            }
        }
    }

    public function sendmail(Request $request)
    {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'msg' => $request->msg
        ];

        Mail::to("berthoerizal10@gmail.com")->send(new TestMail($details));
        return Redirect::to(URL::previous() . "#contact")->with('message_sent', 'Your message has been sent successfully!');
    }
}
