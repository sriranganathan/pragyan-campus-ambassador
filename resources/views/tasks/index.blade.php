@extends('base')

@section('topbar')

<li class="hidden">
    <a href="#page-top"></a>
</li>
<li>
    <a href={{action('UserController@index')}}>Home</a>
</li>

@if (Session::has('admin')||Session::has('fbid'))
<li>    
    <a href={{action('UserController@dashboard')}}>Dashboard</a>
</li>
<li>    
    <a href={{action('UserController@logout')}}>Logout</a>
</li>
@else
<li>
    <a class="page-scroll" href="#register">Register</a>
</li>
@endif
@stop

@section('content')

	<section class="container content-section">

	<div class="row">
	@foreach($tasks as $task)
	<div class="panel panel-primary">
		<div class="panel-heading">
				{{$task->title}}
		</div>
		<div class="panel-body">
			<b>Posted on : {{$task->created_at}}</b>
			<br>
			<button class= "btn btn-primary" data-toggle="modal" data-target="#modal{{$task->id}}">See description</button>
			

		</div>
	</div>

	<div id="modal{{$task->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{$task->title}}</h4>
      </div>
      <div class="modal-body">
       {!! $task->description !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	@endforeach
	</div>
{!! $tasks->render() !!}
	</section>

@stop
