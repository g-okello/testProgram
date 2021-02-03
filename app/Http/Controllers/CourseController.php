<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function select(Course $course)
    {
        return view('select', ['course' => $course]);  
    }

    public function update($course)
    {
        $data = request()->validate([
            'course_name'=>'required',
            'teacher_name'=>'required',
            'hours'=>'required',
        ]); 
        
        \DB::table('courses')->where("courses.id", '=', $course)
        ->update($data);

        return redirect('/home');
    }

    public function remove($course)
    {
        \DB::table('courses')->where("courses.id", '=', $course)
        ->delete();

        return redirect('/home'); 
    }

    public function cancel()
    {
        return redirect('/home');
    }
}
