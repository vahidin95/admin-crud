@extends('layouts.master')

@section('content')

@if(session()->has('message'))
<div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-body">
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
             </div>
             <h3><b>Congratulations</b></h3><h4 class="box-title">{{session()->get('message')}}</h4>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
</div>
@endif

<h3>All categories 
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Add new
    </button>
</h3>
<!-- List of all categories -->
<div class="box">
    <div class="box-header">
        <h3 class="box-title">All categories </h3>
    </div>
    <?php $no=1; ?>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
        <tbody><tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Modify</th>
        </tr>
        @foreach ($categories as $category)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$category->title}}</td>
            <td>{{$category->description}}</td>
            <td>
            <button class="btn btn-info btn-small" data-toggle="modal" data-target="#edit" 
            data-title="{{$category->title}}" data-category_id="{{$category->id}}" data-description="{{$category->description}}">Edit</button>/
            <button type="button" class="btn btn-danger" data-category_id="{{$category->id}}" data-toggle="modal" data-target="#delete">Delete</button>
            </td>
        </tr>
        @endforeach
        </tbody></table>
    </div>
</div>
    <div class="d-flex flex-column-reverse bd-highlight">{{$categories->links()}}</div>
            <!-- /.box-body -->

<!-- Add categories button-->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add new
</button>

<!-- Modal for Create-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('category.store')}}" method="post">
        {{ csrf_field() }}
        <div class="modal-body">
        @include('category.form')
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal for Edit-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('category.update', 'test')}}" method="post">
        {{csrf_field()}}
        {{method_field('patch')}}
        <div class="modal-body">
            <input type="hidden" name="category_id" value="" id="category_id">
        @include('category.form')
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal for Delete-->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="" id="exampleModalLabel">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('category.destroy', 'test')}}" method="post">
        {{csrf_field()}}
        {{method_field('delete')}}
        <div class="modal-body">
            <p class="text-center">Are you sure you want to delete this?</p>
            <input type="hidden" name="category_id" value="" id="category_id">
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
