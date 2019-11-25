@extends('layouts.master')
@section('content')
<div class="callout callout-info">
        <h4><strong>Edit user bellow</strong></h4>
        Here you can add car and for home page go to
        <a href="{{route('login')}}">Dashboard</a>
      </div>
<div class="col-md-8 col-md-offset-1 ">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Information of the user with ID: <strong>{{$user->id}}</strong></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{Route('users.update', $user->id)}}" method="post">
            	{{ csrf_field() }}
            	{{method_field('patch')}}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">{{__('Name of the user')}}</label>
                  <input type="text" name="name" value="{{$user->name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                </div>
                  @if($errors->has('name'))
                  	<span class="invalid-feedback" role="alert">
                  		<strong>{{$errors->first('name')}}</strong>
                  	</span>
                  @endif
                <div class="form-group">
                  <label for="exampleInputEmail1">{{__('Email of the user')}}</label>
                  <input type="text" name="type" value="{{$user->email}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                   @if($errors->has('email'))
                  	<span class="invalid-feedback" role="alert">
                  		<strong>{{$errors->first('email')}}</strong>
                  	</span>
                  @endif
                  <div class="form-group">
                  Select user role
                  <div class="radio">
                    <label>
                      <input type="radio" name="user_type" id="optionsRadios1" value="admin" checked="">
                      Admin
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="user_type" id="optionsRadios1" value="user" checked="">
                      User
                    </label>
                  </div>
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>

@endsection
