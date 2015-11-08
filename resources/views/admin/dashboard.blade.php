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
	Hi, Admin
	</h3>
	Here are the list of operations you can do...
	<li>
	<a href={{action('TasksController@create')}}>Create new tasks</a>
	</li>

	<li>
	<a href={{action('UserController@show')}}>Approve/reject users</a>
	</li>

	<li>
	<a href={{action('UserController@showApproved')}}>Approved users</a>
	</li>

	<li>
	<a href={{action('UserController@showRejected')}}>Rejected users</a>
	</li>
	</section>

@stop