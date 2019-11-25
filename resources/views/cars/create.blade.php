@extends('layouts.master')
@section('title', 'Create new car')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="col-md-5 col-md-offset-1 ">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- form start -->
            <form role="form" action="{{route('car.store')}}" method="post">
            	{{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">{{__('Name of the car')}}</label>
                  <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                </div>
                  @if($errors->has('name'))
                  	<span class="invalid-feedback" role="alert">
                  		<strong>{{$errors->first('name')}}</strong>
                  	</span>
                  @endif
                <div class="form-group">
                  <label for="exampleInputEmail1">{{__('Type of the car')}}</label>
                  <input type="text" name="type" value="{{old('type')}}" class="form-control" id="exampleInputEmail1" placeholder="Enter type">
                </div>
                   @if($errors->has('type'))
                  	<span class="invalid-feedback" role="alert">
                  		<strong>{{$errors->first('type')}}</strong>
                  	</span>
                  @endif
                  <div class="form-group">
                    <label>Person</label>
                    <select name="people_id" class="form-control">
                      <option value="" disabled>Select person</option>
                      @foreach ($people as $person)
                      <option value="{{$person->id}}">{{$person->name}}</option>
                      @endforeach
                    </select>
                  </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">{{__('Color of the car')}}</label>
                  <input type="text" name="color" value="{{old('color')}}" class="form-control" id="exampleInputEmail1" placeholder="Enter color">
                </div>
                  @if($errors->has('color'))
                  	<span class="invalid-feedback" role="alert">
                  		<strong>{{$errors->first('color')}}</strong>
                  	</span>
                  @endif
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" value="Submit" name="submit" class="btn btn-primary">
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>

@endsection