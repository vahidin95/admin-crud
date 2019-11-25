@extends('layouts.master')
@section('title', 'Edit a student')
@section('header')
<!-- bootstrap selector -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
  <!-- form start -->
  {!! Form::open(['route' => ['students.update', $student->id], 'method'=> 'patch','class' => 'form-horizontal']) !!}
  {{ csrf_field() }}
  <div class="box-body">
    <div class="col-md-12 form-group">
         {!! Form::label('name', 'name', ['class' => ' control-label']) !!}
         {!! Form::text('name', $student->name, ['class' => 'form-control', 'placeholder' => 'Name here']) !!}
         <p class="help-block"></p>
         @if($errors->has('name'))
             <p class="help-block">
                 {{ $errors->first('name') }}
             </p>
         @endif
     </div>
     <div class="col-xs-12 form-group">
          {!! Form::label('email', 'email', ['class' => 'control-label']) !!}
          {!! Form::text('email', $student->email, ['class' => 'form-control', 'placeholder' => 'Email here']) !!}
          <p class="help-block"></p>
          @if($errors->has('email'))
              <p class="help-block">
                  {{ $errors->first('email') }}
              </p>
          @endif
      </div>
      <div class="col-xs-12 form-group">
           {!! Form::label('place', 'place', ['class' => 'control-label']) !!}
           {!! Form::text('place', $student->place, ['class' => 'form-control', 'placeholder' => 'Place here']) !!}
           <p class="help-block"></p>
           @if($errors->has('place'))
               <p class="help-block">
                   {{ $errors->first('place') }}
               </p>
           @endif
       </div>
       <div class="col-xs-12 form-group">
            {!! Form::label('courses', 'Courses', ['class' => 'control-label']) !!}
            {!! Form::select('courses' ,$courses, $student->courses, ['class' => 'form-control selectpicker courses', 'multiple' => 'multiple' ] )!!}
            <p class="help-block"></p>
            @if($errors->has('course'))
                <p class="help-block">
                    {{ $errors->first('course') }}
                </p>
            @endif
        </div>
        {!! Form::submit('Update student', ['class' => 'btn btn-success']) !!}
      </div>
  {!! Form::close() !!}
</div>
@endsection

<!-- OPTIONAL SCRIPTS -->
@section('scripts')
<script type="text/javascript">

$(document).ready(function() {
    $.('.courses').selectpicker().val( (( json_decode($student->courses()->allRelatedIds())  ))  ).triger('change');
});

</script>
@endsection
