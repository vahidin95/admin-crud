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
<h3>All categories 
	<a href="{{route('people.create')}}" class="btn btn-primary">{{__('Create')}}</a>   
</h3>
        <!-- List of all cars -->
<div class="box">
    <div class="box-header">
        <h3 class="box-title">All Peoples </h3>
    <div class="box-tools">
        <form action="" method="get">
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
    <?php $no=1; ?>
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
        <tbody><tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Modify</th>
        </tr>
        @foreach ($people as $person)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$person->name}}</td>
            <td>{{$person->email}}</td>
            <td>{{$person->phone}}</td>
            <td> 
            	<form action="{{route('people.destroy', $person->id)}}" method="post">
            		{{csrf_field()}}
        			{{method_field('delete')}}
            	<a href="{{route('people.show', $person->id)}}" class="btn btn-success btn-sm">{{__('Show')}}</a>
            	<a href="{{route('people.edit', $person->id)}}" class="btn btn-primary btn-sm">{{__('Edit')}}</a>
            	<button type="submit" class="btn btn-sm btn-danger">Delete</button>
            	</form>
			</td>
        </tr>
        @endforeach	
        </tbody></table>
    </div>
</div>
    <div class="d-flex flex-column-reverse bd-highlight">{{$people->links()}}</div>

@endsection