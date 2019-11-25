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
@endif

<form action="{{route('courses.store')}}" method="post">
  <h4 class="">Create new <strong>course</strong> for students</h4>
  {{ csrf_field() }}
  <div class="input-group input-group-sm col-md-6">
    <input type="text" name="course_name" value="{{old('course_name')}}" class="form-control" placeholder="Example: Laravel 5.7 ..">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-info btn-flat">Create new!</button>
        </span>
  </div><br>
</form>
        <!-- List of all courses available -->
<div class="box">
    <div class="box-header">
        <h3 class="box-title">All courses </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
        <tbody><tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created</th>
            <th>Modify<th>
        </tr>
        @foreach ($courses as $course)
        <tr>
            <td>{{$course->id}}</td>
            <td>{{$course->course_name}}</td>
            <td>{{$course->created_at->diffForHumans()}}</td>
            <td>
            	<form action="{{route('courses.destroy', $course->id)}}" method="post">
            		{{csrf_field()}}
        			{{method_field('delete')}}
              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit-course"
              data-course_name="{{$course->course_name}}" data-course_name_id="{{$course->id}}">Edit</button>
            	<button type="submit" class="btn btn-sm btn-danger">Delete</button>
            	</form>
			</td>
        </tr>
        @endforeach
        </tbody></table>
    </div>
</div>
<div class="d-flex flex-column-reverse bd-highlight">{{$courses->links()}}</div>

<!-- Modal for Edit course-->
<div class="modal fade" id="edit-course" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('courses.update', 'test')}}" method="post">
        {{csrf_field()}}
        {{method_field('patch')}}
        <div class="modal-body">
            <input type="hidden" name="course_name_id" value="" id="course_name_id">
            <div class="form-group">
                <label for="course_name">Course name</label>
                <input type="text" name="course_name" class="form-control" id="course_name" placeholder="course_name" value="" required />
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
