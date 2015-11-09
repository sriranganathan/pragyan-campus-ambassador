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
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Hi, {{$fbname}}</h2>
                <h3>Just a few more questions...</h3>
                <p>
    <form class="form-horizontal" method="POST" action={{ action('UserController@store')}}>
  <div class="form-group">
    <label class="control-label col-sm-2" for="college"><center>College</center></label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="college" placeholder="College" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="city"><center>City</center></label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="city" placeholder="City" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="dept"><center>Department</center></label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="dept" placeholder="Department" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="year"><center>Year of study</center></label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="year" placeholder="Year of study" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="mobile"><center>Mobile Number</center></label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="mobile" placeholder="Mobile Number" pattern=[0-9]{10} required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="email"><center>Email</center></label>
    <div class="col-sm-6">
      <input type="email" class="form-control" name="email" placeholder="Email" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="por"><center>Position(s) of responsibility held (if any) </center></label>
    <div class="col-sm-6">
      <textarea class="form-control" name="por" placeholder="Position(s) of responsibility held (if any) " rows="5"></textarea>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="question"><center>Why are you applying for this post? </center></label>
    <div class="col-sm-6">
      <textarea class="form-control" name="por" placeholder="Why are you applying for this post?" rows="5" required></textarea>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-6">
      <button type="submit" class="btn btn-success">Submit</button>
    </div>
  </div>
</form>

</p>
            </div>
        </div>
    </section>
@stop