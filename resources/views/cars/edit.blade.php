@extends('layouts.master')
@section('content')
<div class="callout callout-info">
        <h4><strong>Edit inforrmation of the Car</strong></h4>
        Here you can add car and for home page go to
        <a href="{{route('login')}}">Dashboard</a>
      </div>
<div class="col-md-8 col-md-offset-1 ">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Information of the car with ID: <strong>{{$car->id}}</strong></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{Route('car.update', $car->id)}}" method="post">
            	{{ csrf_field() }}
            	{{method_field('patch')}}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">{{__('Name of the car')}}</label>
                  <input type="text" name="name" value="{{$car->name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                </div>
                  @if($errors->has('name'))
                  	<span class="invalid-feedback" role="alert">
                  		<strong>{{$errors->first('name')}}</strong>
                  	</span>
                  @endif
                <div class="form-group">
                  <label for="exampleInputEmail1">{{__('Type of the car')}}</label>
                  <input type="text" name="type" value="{{$car->type}}" class="form-control" id="exampleInputEmail1" placeholder="Enter type">
                </div>
                   @if($errors->has('type'))
                  	<span class="invalid-feedback" role="alert">
                  		<strong>{{$errors->first('type')}}</strong>
                  	</span>
                  @endif
                <div class="form-group">
                  <label for="exampleInputEmail1">{{__('Color of the car')}}</label>
                  <input type="text" name="color" value="{{$car->color}}" class="form-control" id="exampleInputEmail1" placeholder="Enter color">
                </div>
                  @if($errors->has('color'))
                  	<span class="invalid-feedback" role="alert">
                  		<strong>{{$errors->first('color')}}</strong>
                  	</span>
                  @endif
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>

@endsection