<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Portfolio;
use Illuminate\Support\Facades\DB;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

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

    public function downloadcv()
    {
        $filePath = public_path('/files/Bertho_Erizal_CV.pdf');
        $headers = ['Content-Type: application/pdf'];
        $fileName = 'Bertho_Erizal_CV_' . time() . '.pdf';

        return response()->download($filePath, $fileName, $headers);
    }
}
