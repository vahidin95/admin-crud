@extends('layouts.master')
@section('content')

<h3>All categories 
	<a href="{{route('car.create')}}" class="btn btn-primary">{{__('Create')}}</a>   
</h3>
        <!-- List of all cars -->
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
            <th>Name</th>
            <th>Type</th>
            <th>Color</th>
            <th>User</th>
            <th>Modify</th>
        </tr>
        @foreach ($cars as $car)
        <tr>
            <td>{{$car->id}}</td>
            <td>{{$car->name}}</td>
            <td>{{$car->type}}</td>
            <td>{{$car->color}}</td>
            <th>{{$car->people->name}}</th> 
            <td> <a href="{{ route('car.show', $car->id) }}" class="btn btn-sm btn-success">{{__('Show')}}</a>
			 <a href="{{ route('car.edit', $car->id) }}" class="btn btn-sm btn-primary">{{__('Edit')}}</a>
			 <a type="button" data-car_id="{{$car->id}}" data-toggle="modal" data-target="#delete_car" class="btn btn-sm btn-danger">Delete</a>
			</td>
        </tr>
        @endforeach
        </tbody></table>
    </div>
</div>
    <div class="d-flex flex-column-reverse bd-highlight">{{$cars->links()}}</div>

<!-- Modal for Delete-->
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

<div class="col-md-12">
    <h1 class="text-center">What each person have</h1>
  @foreach ($people as $person)
    <div class="col-md-2">
    <h2>{{$person->name}}</h2>
    <ul>
      @foreach ($person->car as $car)
       <li><h4>{{$person->name}}</h4></li>
      @endforeach
    </ul>
    </div>
  @endforeach
</div>



@endsection