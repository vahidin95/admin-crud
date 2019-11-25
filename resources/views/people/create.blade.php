@extends('layouts.master')

@section('content')
<div class="col-md-6 col-md-offset-3">
  <div class="box box-successs">
      <div class="box-header with-border">
        <h3 class="box-title">General Elements</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <form role="form" action="{{route('people.store')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <!-- text input -->
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Enter title ...">
          </div>
          @if($errors->has('name'))
            <div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <p><i class="icon fa fa-warning"></i>{{$errors->first('name')}}!</p>
            </div>
          @endif
          <!-- Author -->
          <div class="form-group">
            <label>Email</label>
            <input type="text" value="{{old('email')}}" class="form-control" name="email" placeholder="Enter your email ...">
          </div>
          @if($errors->has('email'))
            <div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <p><i class="icon fa fa-warning"></i>{{$errors->first('email')}}!</p>
            </div>
          @endif
          <div class="form-group">
            <label>Phone number</label>
            <input type="text" value="{{old('phone')}}" class="form-control" name="phone" placeholder="Enter your phone ...">
          </div>
          @if($errors->has('phone'))
            <div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <p><i class="icon fa fa-warning"></i>{{$errors->first('phone')}}!</p>
            </div>
          @endif
          <div class="box-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
</div>
@endsection
