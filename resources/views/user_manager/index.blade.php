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

<h3>Users manager services <small><b>All users</b></small></h3>

<h3>
    <a type="button" class="btn btn-primary" href="{{route('users.create')}}">
          Add new user
    </a>
</h3>
<!-- List of all categories -->
<div class="box">
    <div class="box-header">
        <h3 class="box-title">All users </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
        <tbody><tr>
            <th>ID</th>
            <th>Name</th>
            <th>Role</th>
            <th>Email</th>
            <th style="width: 250px;">Action</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->user_type}}</td>
            <td>{{$user->email}}</td>
             <td> <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-success">{{__('Show')}}</a>
			 <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">{{__('Edit')}}</a>
			 <a type="button" data-car_id="{{$user->id}}" data-toggle="modal" data-target="#delete_car" class="btn btn-sm btn-danger">Delete</a>
			</td>
        </tr>
        @endforeach
        </tbody></table>
    </div>
</div>
<!-- /.box-body -->

<!-- Add user button-->
<a type="button" class="btn btn-primary" href="{{route('users.create')}}">
          Add new user
</a>

 <div class="d-flex flex-column-reverse bd-highlight">{{$users->links()}}</div>





@endsection
