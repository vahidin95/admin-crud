@extends('layouts.master')
@section('content')

@if(session()->has('message'))
      <div class="box box-success">
        <div class="box-body">
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
             </div>
             <h4 class="box-title">{{session()->get('message')}}</h4>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
@endif

<h3>All Posts
	<a href="{{route('posts.create')}}" class="btn btn-primary">{{__('Create')}}</a>
</h3>
        <!-- List of all cars -->
<div class="box">
    <div class="box-header">
        <h3 class="box-title">All categories </h3>
    <div class="box-tools">
        <form action="{{'/search'}}" method="get">
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
            <th>Image</th>
            <th>Name</th>
            <th>Status</th>
            <th>Contect</th>
            <th>Category</th>
            <th>Author</th>
            <th>Action</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td><img src="{{URL::to('/')}}/images/posts/{{$post->image}}"
            class="" style="width: 50px; height: 50px;" alt="slika"></td>
            <td>{{$post->name}}</td>
            <td>{{$post->status}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->category->title}}</td>
            <td>{{$post->user->name}}</td>
            <td>
            @can('isAdmin')
              @if(Auth::user()->name != $post->user->name)
                <a href="{{route('posts.show', $post->id)}}" class="btn btn-success btn-sm">{{__('Show')}}</a>
              @else
            	<form action="{{route('posts.destroy', $post->id)}}" method="post">
            		{{csrf_field()}}
        			{{method_field('delete')}}
            	<a href="{{route('posts.show', $post->id)}}" class="btn btn-success btn-sm">{{__('Show')}}</a>
            	<a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary btn-sm">{{__('Edit')}}</a>
            	<button type="submit" class="btn btn-sm btn-danger">Delete</button>
            	</form>
              @endif
            @endcan
			</td>
        </tr>
        @endforeach
        </tbody></table>
    </div>
</div>
    <div class="d-flex flex-column-reverse bd-highlight">{{$posts->links()}}</div>
  <div class="row">
  <div class="col-md-6">
   <ul>
     <li><strong>Active</strong></li>
       @foreach ($activePosts as $activePost)
       <li>{{$activePost->name}} with category <strong>{{$activePost->category->title}}</strong></li>
       @endforeach
   </ul>
  </div>
  <div class="col-md-6">
    <ul>
     <li><strong>Inactive</strong></li>
       @foreach ($inactivePosts as $inactivePost)
       <li>{{$inactivePost->name}} with category <strong>{{$inactivePost->category->title}}</strong></li>
       @endforeach
    </ul>
  </div>
  <div class="col-md-6">
    <h4 class="text-muted">Categories</h4>
    @foreach ($categories as $category)
      <h3>{{$category->title}}</h3>
      <ul>
    @foreach ($category->post as $post)
         <li>{{$post->name}}</li>
    @endforeach
      </ul>
    @endforeach
  </div>

</div>
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
