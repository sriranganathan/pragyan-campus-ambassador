@extends('base')

@section('topbar')
	

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
			
			{!! str_replace("\n","<br>", $task->description) !!} 

		</div>
	</div>
	@endforeach
	</div>
{!! $tasks->render() !!}
	</section>

@stop
