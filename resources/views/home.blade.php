@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Welcome {{ $user->name }}.
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div id="register-course">
    <div id="register-course-title">
        <p style="margin: 50px; font-size: 25px; font-weight: bold; text-align: center;">Register Course</p>
    </div>
    
    <div id="register-course-form">
        <form enctype="multipart/form-data"style="margin-left: 20%; margin-right: 20%;" action="/home/{user}" method="post">
            
            @csrf

            <label for="course_name" style=" font-weight: bold; ">Course Name:</label><br>
            <input type="text" id="course_name" style="margin-bottom: 20px; width: -webkit-fill-available;"
            name="course_name"placeholder="Enter course name"><br>
            
                @if ($errors->has('course_name'))
                    <p style="color:red">{{$errors->first('course_name') }}</p>
                    
                @endif

            <label for="teacher_name" style=" font-weight: bold; ">Teacher name:</label><br>
            <input type="text" id="teacher_name" style="margin-bottom: 20px; width: -webkit-fill-available;"
            name="teacher_name"placeholder="Enter teacher name"><br>
            
                @if ($errors->has('teacher_name'))
                    <p style="color:red">{{$errors->first('teacher_name') }}</p>
                @endif
            
            <label for="hours" style=" font-weight: bold; ">Total of hours</label><br>
            <input type="number" id="hours" style="margin-bottom: 20px; width: -webkit-fill-available;"
            name="hours"placeholder="Enter number of hours"><br>
            
                @if ($errors->has('hours'))
                    <p style="color:red">{{$errors->first('hours') }}</p>
                @endif
            
            <input type="submit" value="Register" class="btn btn-primary">
        </form>
    </div>

    <div id="register-course-table" style="padding-bottom: 150px; padding-top: 50px;">
        <table style="margin-left: 20%; margin-right: 20%; width: -webkit-fill-available">
            <tr style="border-top: 1px solid; border-bottom: 1px solid;">
                <th>Unique Code</th>
                <th>Course Name</th>
                <th>Teacher name</th>
                <th>Total of hours</th>
                <th>Select</th>
            </tr>
            @foreach($user->course as $course)
            <tr style="border-bottom: 1px solid #dcdcdc;">
                <td>{{$course->id}}</td>
                <td>{{$course->course_name}}</td>
                <td>{{$course->teacher_name}}</td>
                <td>{{$course->hours}}</td>
                <td><a href="/home/course/{{$course->id}}/edit" style="margin: 7px;" class="btn btn-primary" >Select</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection
