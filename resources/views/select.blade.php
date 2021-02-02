@extends('layouts.app')

@section('content')

<div id="register-course">
    <div id="register-course-title">
        <p style="margin: 50px; font-size: 25px; font-weight: bold; text-align: center;">Edit Course</p>
    </div>
    
    <div id="register-course-form">
        <form enctype="multipart/form-data"style="margin-left: 20%; margin-right: 20%;" method="post" action="/home/course/{{$course->id}}/update">
            
            @csrf
            @method('PATCH')

            <label for="course_name" style=" font-weight: bold; ">Course Name:</label><br>
            <input type="text" id="course_name" style="margin-bottom: 20px; width: -webkit-fill-available;"
            name="course_name"placeholder="Enter course name" value="{{$course->course_name}}"><br>
            
                @if ($errors->has('course_name'))
                    <p style="color:red">{{$errors->first('course_name') }}</p>
                    
                @endif

            <label for="teacher_name" style=" font-weight: bold; ">Teacher name:</label><br>
            <input type="text" id="teacher_name" style="margin-bottom: 20px; width: -webkit-fill-available;"
            name="teacher_name"placeholder="Enter teacher name" value="{{$course->teacher_name}}"><br>
            
                @if ($errors->has('teacher_name'))
                    <p style="color:red">{{$errors->first('teacher_name') }}</p>
                @endif
            
            <label for="hours" style=" font-weight: bold; ">Total of hours</label><br>
            <input type="number" id="hours" style="margin-bottom: 20px; width: -webkit-fill-available;"
            name="hours"placeholder="Enter number of hours" value="{{$course->hours}}"><br>
            
                @if ($errors->has('hours'))
                    <p style="color:red">{{$errors->first('hours') }}</p>
                @endif
            
                <input type="submit" value="Edit" class="btn btn-primary" />

                <a href="/home/course/{{$course->id}}/remove">
                    <input type="button" value="Remove" class="btn btn-primary" />
                </a>
                <a href="/home/course/{{$course->id}}/cancel">
                    <input type="button" value="Cancel" class="btn btn-primary" />
                </a>


        </form>
        
        
    </div>
</div>
@endsection
