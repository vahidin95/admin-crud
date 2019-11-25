@extends('layouts.master')
@section('content')

@if(session()->has('success'))
      <div class="box box-success">
        <div class="box-body">
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
             </div>
             <h4 class="box-title">{{session()->get('success')}}</h4>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
@endif
@if(session()->has('warning'))
      <div class="box box-warning">
        <div class="box-body">
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
             </div>
             <h4 class="box-title">{{session()->get('warning')}}</h4>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
@endif

<h3>All Students
	<a href="{{route('students.create')}}" class="btn btn-primary">{{__('Create')}}</a>
</h3>
        <!-- List of all cars -->
<div class="box">
  <div class="box-header">
      <h3 class="box-title">All Students </h3>
  <div class="box-tools">
      <form action="{{'search'}}" method="get">
          <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
               <input type="text" name="search" class="form-control pull-right" placeholder="Search by name">

               <div class="input-group-btn">
              <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
        </div>
      </form>
      </div>
    </div>
  </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
        <tbody><tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Place</th>
            <th>Subjects</th>
            <th>Created</th>
            <th>Modify</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->place}}</td>
            <td>@foreach($student->courses as $course)
                  <span class="label label-info">{{$course->course_name}}</span>
                @endforeach
            </td>
            <td>{{$student->created_at->diffForHumans()}}</td>
            <td>
              <form action="{{route('students.destroy', $student->id)}}" method="post">
                {{csrf_field()}}
              {{method_field('delete')}}
              <a href="{{route('students.edit', $student->id)}}" class="btn btn-info btn-sm">Edit</a>
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
              </form>
      </td>
        </tr>
        @endforeach
        </tbody></table>
    </div>
</div>
    <div class="d-flex flex-column-reverse bd-highlight">{{$students->links()}}</div>

<!-- Modal for Show-->
<div class="modal modal-danger fade" id="delete_car" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="" id="exampleModalLabel">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('car.destroy', 'test')}}" method="post">
        {{csrf_field()}}
        {{method_field('delete')}}
        <div class="modal-body">
        	<input type="hidden" name="car_id" value="" id="car_id">
            <p class="text-center">Are you sure you want to delete this?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel!</button>
            <button type="submit" class="btn btn-default">Yes, Delete!</button>
        </div>
      </form>

    </div>
  </div>
</div>

@endsection
