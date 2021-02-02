<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

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

    public function update($course_id)
    {
        $data = request()->validate([
            'course_name'=>'required',
            'teacher_name'=>'required',
            'hours'=>'required',
        ]); 
        
        \DB::table('courses')->where("courses.id", '=',  $course_id)
        ->update($data);

        return redirect('/home/' . auth()->id());
    }

    public function remove($course_id)
    {
        \DB::table('courses')->where("courses.id", '=',  $course_id)
        ->delete();

        return redirect('/home/' . auth()->id()); 
    }

    public function cancel()
    {
        return redirect('/home/' . auth()->id());
    }
}
