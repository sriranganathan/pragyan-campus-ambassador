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
	<h3>
	Hi, {{$user->full_name}}
	</h3>
	@if($user->registration==0)
	<li>
		<a href={{action('UserController@create')}}>Complete registration</a>
	</li>
	@elseif($user->approved == 0)
	<li>
		You have successfully completed your registration. We will notify you when we process your registration.
	</li>
	@elseif($user->approved == 2)
	<li>
		Sorry! Your request to be a campus ambassador was not approved.
		Please try next year.
	</li>
	@else
	Congrats. You are a campus ambassador for pragyan.
	<li>
	<a href={{action('TasksController@index')}}>View list of tasks</a>
	</li>

	@endif
	</section>
@stop
