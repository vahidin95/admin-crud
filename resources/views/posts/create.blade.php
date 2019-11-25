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
<div class="col-md-6 col-md-offset-3">
  <div class="box box-successs">
      <div class="box-header with-border">
        <h3 class="box-title">General Elements</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <form role="form" action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <!-- text input -->
          <div class="form-group">
            <label>Tittle</label>
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
            <label>Author</label>
            <select name="user_id" class="form-control">
              <option value="" disabled>Select Users</option>
              @foreach ($users as $user)
              <option value="{{$user->id}}">{{$user->name}}</option>
              @endforeach
            </select>
          </div>
          <!-- textarea -->
          <div class="form-group">
            <label>Textarea</label>
            <textarea class="form-control" rows="3" name="body" placeholder="Enter content...">{{old('body')}}</textarea>
          </div>
          @if($errors->has('body'))
            <div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <p><i class="icon fa fa-warning"></i>{{$errors->first('body')}}!</p>
            </div>
          @endif
          <div class="form-group">
            <label>Select</label>
            <select name="status" class="form-control">
              <option value="" disabled>Select post status</option>
              <option value="1">Active</option>
              <option value="0">Inactive</option>
            </select>
          </div>
          <div class="form-group">
            <label>Category</label>
            <select name="category_id" class="form-control">
              <option value="" disabled>Select category</option>
              @foreach ($categories as $category)
              <option value="{{$category->id}}">{{$category->title}}</option>
              @endforeach
            </select>
          </div>
          @if($errors->has('status'))
            <div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <p><i class="icon fa fa-warning"></i>{{$errors->first('status')}}!</p>
            </div>
          @endif
          <div class="form-group">
            <label for="exampleInputFile">Add image</label>
            <input type="file" name="image" id="exampleInputFile">
          </div>
          @if($errors->has('image'))
            <div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <p><i class="icon fa fa-warning"></i>{{$errors->first('image')}}!</p>
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
