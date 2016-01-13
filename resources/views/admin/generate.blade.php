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
	Referral codes generated successfully
	</h3>
	
	<div class="row">
		For...<br>
		@for($i=0; $i<count($users); $i++)
			<li>{{$users[$i]}} -> {{$codes[$i]}}</li>
		@endfor
		
	</div>
	</section>

@stop
