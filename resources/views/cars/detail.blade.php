@extends('layouts.master')
@section('content')

<div class="col-md-8 col-md-offset-2" >
	<div class="jumbotron text-center" style="background-color: #f0f0aa">
	  <h2>Car name: <strong>{{$car->name}}</strong></h2>
	  <h3 class="">Car type: <strong>{{$car->type}}</strong></h3>
	  <h3 class="">Car color: <strong>{{$car->color}}</strong></h3>
	  <h3 class="">Created: <strong class="text-muted text-center">{{$car->created_at}}</strong></h3>
	  <a class="btn btn-primary btn-lg pull-left" href="{{route('car.index')}}" role="button">Return</a>
	  <a href="{{route('car.create')}}" class="btn btn-primary pull-right btn-lg">{{__('Create')}}</a>  
	</div>
</div>
@endsection