@extends('layouts.master')

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
<div class="box box-successs">
            <div class="box-header with-border">
              <h3 class="box-title">General Elements</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="{{route('posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{method_field('patch')}}
                <!-- text input -->
                <div class="form-group">
                  <label>Tittle</label>
                  <input type="text" class="form-control" name="name" value="{{$post->name}}" placeholder="Enter title ...">
                </div>
                <!-- Author -->
                 <div class="form-group">
                  <label>Author</label>
                  <select name="user_id" value="{{$post->user->id}}" class="form-control">
                    <option value="" disabled>Select Users</option>
                    @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                  </select>
                </div>
                <!-- textarea -->
                <div class="form-group">
                  <label>Textarea</label>
                  <textarea class="form-control" value="" rows="3" name="body" placeholder="Enter content...">{{$post->body}}</textarea>
                </div>
                <div class="form-group">
                  <label>Select</label>
                  <select name="status" class="form-control">
                    <option value="{{$post->status}}" disabled>Select post status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Category</label>
                  <select name="category_id" value="{{$post->category->id}}" class="form-control">
                    <option value="" disabled>Select category</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label class="">Choice new image</label>
                  <input type="file" name="image" id="exampleInputFile">
                  <input type="hidden" name="hidden_image">
                </div>
                <img src="{{URL::to('/')}}/images/posts/{{$post->image}}" class="thumbnail" style="height: 100px;width: 100px;">
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>

@endsection
