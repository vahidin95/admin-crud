@extends('layouts/app')

@section('content')
@if(session()->has('error'))
	 <br>
	 <h4 class="box-title">{{session()->get('error')}}</h4>
	 <p><a href="{{route('home')}}">Go back to home</a></p>
@endif
@endsection