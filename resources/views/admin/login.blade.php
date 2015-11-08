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
	<section id="about" class="container content-section">
        <div class="row">
   
    <form class="form-horizontal" method="POST" action={{ action('UserController@adminCheck')}}>
  <div class="form-group">
    <label class="control-label col-sm-2" for="username"><center>Username</center></label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="username" placeholder="Username" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="password"><center>Password</center></label>
    <div class="col-sm-6">
      <input type="password" class="form-control" name="password" placeholder="Password" required>
    </div>
  </div>

  <div class="form-group">
  <label class="control-label col-sm-2" for="password"><center></center></label>
    <div class="col-sm-6">
      <button type="submit" class="btn btn-success">Submit</button>
    </div>
  </div>
  </form>
	
@stop
