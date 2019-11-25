
HOW TO MAKE SEEDER

php artisan make:model Something -mcr  (For all Model, table and Controller :)  )

php artisan make:seeder CoursesTableSeeder

insert on the top
DB and Carbon

public function run()(
DB::table('courses')->insert(
   [
    'name' = 'something',
    'created_at' = Carbon::now()->format('Y-m-d H:i:s'),
    'updated_at' = Carbon::now()->format('Y-m-d H:i:s')
    ],
    [next...]
)
)

then make class in DatabaseSeeder for previous seeder

select.org  for tags select form

for many to many table

php artisan make:migration create_course_student_table --create=course_student

//to be sure that databsae will use our table instead of automatic generetic laravel table


on course_student_table we'll write

public function up()
(
Schema::create('course_student', function (Blueprint $table))(

    $table->increment('id');

    $table->unsignedInteger('student_id'); 
    $table->foreign('student_id')->references('id')->on('students');

    $table->unsignedInteger('course_id');
    $table->foreign('course_id')->references('id')->on('courses');
    $table->timestamps();
)
ADD AND UPDATE
$student->courses()->sync($request->courses, detaching:false); to add on course_student and also to update because sync() will just rewrite in database

DELETE
$student->courses()->detach();

<span class="label label-info"></span>

<script type="text/javascript">
    $.('.course').select2().val( (( json_encode($student->courses()->allRelatedIds())  ))  ).triger('change');
</script>


created_at()->diffForHumans()





 <div class="col-md-6">
  <h4 class="text-muted">Users</h4>
  @foreach ($users as $user)
    <h3>{{$user->name}}</h3>
    <ul>
  @foreach ($user->posts as $post)
  <li><strong>Titles: </strong>{{$post->name}}</li>
  @endforeach
    </ul>
  @endforeach
</div>






<!--  _________________________________________________-->



@extends('layouts.master')
@section('title', 'Create a student')
@section('header')
<!-- bootstrap selector -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

@endsection
@section('content')

<h2 class="text-center">Form <b>student</b></h2><br>
<div class="box box-info" >
  <div class="box-header with-border">
    <h2 class="box-title">Add new student</h2>
  </div><br>
  <!-- /.box-header -->


  <div class="form-group">
   <label>Author</label>
   <select name="$courses" class="form-control" multiple>
     <option value="" disabled>Select Users</option>
     @foreach ($courses as $course)
     <option value="{{$course->id}}">{{$course->course_name}}</option>
     @endforeach
   </select>
  </div>

  <!-- form start -->
  {!! Form::open(['route' => 'students.store', 'method'=> 'post','class' => 'form-horizontal']) !!}
  {{ csrf_field() }}
  <div class="box-body">
    <div class="col-xs-12 form-group">
         {!! Form::label('name', 'name', ['class' => 'col-sm-2 control-label']) !!}
         {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
         <p class="help-block"></p>
         @if($errors->has('name'))
             <p class="help-block">
                 {{ $errors->first('name') }}
             </p>
         @endif
     </div>
     <div class="col-xs-12 form-group">
          {!! Form::label('email', 'email', ['class' => 'control-label']) !!}
          {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Email here']) !!}
          <p class="help-block"></p>
          @if($errors->has('email'))
              <p class="help-block">
                  {{ $errors->first('email') }}
              </p>
          @endif
      </div>
      <div class="col-xs-12 form-group">
           {!! Form::label('place', 'place', ['class' => 'control-label']) !!}
           {!! Form::text('place', old('place'), ['class' => 'form-control', 'placeholder' => '']) !!}
           <p class="help-block"></p>
           @if($errors->has('place'))
               <p class="help-block">
                   {{ $errors->first('place') }}
               </p>
           @endif
       </div>
       <div class="col-xs-12 form-group">
            {!! Form::label('courses', 'Courses', ['class' => 'control-label']) !!}
            {!! Form::select('courses[]',$courses, old('courses[]'), ['class' => 'form-control selectpicker courses', 'multiple' => 'multiple' ] )!!}
            <p class="help-block"></p>
            @if($errors->has('course'))
                <p class="help-block">
                    {{ $errors->first('course') }}
                </p>
            @endif
        </div>
      </div>
  {!! Form::close() !!}
</div>
<div class="box box-info" >

</div>

@endsection

<!-- OPTIONAL SCRIPTS -->
@section('scripts')

<script type="text/javascript">
$(document).ready(function(){
    $.('.courses').selectpicker().val( (( json_encode($student->courses()->allRelatedIds())  ))  ).triger('change');
})

</script>
@endsection
