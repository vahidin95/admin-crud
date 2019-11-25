@extends('layouts.master')

@section('content')
<div class="col-md-8 col-md-offset-2">
	<h2 class="text-center">One of the posts</h2>
	<div class="box box-solid">
		<div class="box-header with-border">
		  <i class="fa fa-text-width"></i>

		  <h3 class="box-title">Post with ID: <strong>{{$post->id}}</strong></h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
		  <dl class="dl-horizontal">
		    <dt>Post Title</dt>
		    <dd>{{$post->name}}</dd>
		    <dt>Post contenct</dt>
		    <dd>{{$post->body}}</dd>
		    <dt>Post author</dt>
		    <dd>{{$post->user->name}}</dd>
				<dt>Post category</dt>
				<dd>{{$post->category->title}}</dd>
		    <dt>Post picture</dt>
		    <dd><img src="{{URL::to('/')}}/images/posts/{{$post->image}}" class="thumbnail" style="height: 100px;width: 100px;"></dd>
		    <dt>Created </dt>
		    <dd>{{$post->created_at->diffForHumans()}}</dd>
		  </dl>
		<a href="{{route('posts.index')}}" class="btn btn-primary">{{__('Go back')}}</a>
		<a href="{{route('posts.create')}}" class="btn btn-success pull-right">{{__('Create new')}}</a>
		</div>
	</div>
</div>
@endsection
