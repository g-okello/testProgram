<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', ['user' => Auth::user()]);
    }

    public function store()
    {
        $data = request()->validate([
            'course_name'=>'required',
            'teacher_name'=>'required',
            'hours'=>'required',
        ]);

        auth()->user()->course()->create($data);

        return redirect('/home');
    }
}
