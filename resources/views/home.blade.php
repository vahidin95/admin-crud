@extends('layouts.master')

@section('content')
@can('isAdmin')
 <div class="col-md-12"><br>
    <div class="col-md-8">
    <h3 class=""> Selam alejkum <strong>{{Auth::user()->name}}</strong></h3><br>
      <div class="box box-solid">
        <div class="box-header with-border text-center">
          <i class="fa fa-text-width"></i>

          <h3 class="box-title">Was wir soll heute machen ?</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <blockquote>
            <p>Selam alejkum, can you make view for Users and make eloquent relationships with Car model tomorow ? DONE!!</p>
            <p>Foreach in posts donesnt working properly, you should fix it
              and fix as soon as posible and also finish edit of the students view</p>
              <p><b>Please make seeders for every table and fake factories as well!!</b></p>
            <small>Author <cite title="Source Title">{{Auth::user()->name}} </cite> the time is {{ date("h : i : sa")}}</small>
          </blockquote>
          
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
</div>
@endcan

<!-- Admin should not see this contect down bellow -->

@cannot('isAdmin')
<div class="col-md-8 col-md-offset-3"><br>
    <div class="col-md-8"><br>
      <div class="box box-solid">
        <div class="box-header with-border text-center">
          <i class="fa fa-text-width"></i>

          <h3 class="box-title">Selam alejkum <b>{{Auth::user()->name}}</b></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">          
          
          <h4 class="text-center">What will you create today</h4 >
          
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
</div>
@endcannot

@endsection
