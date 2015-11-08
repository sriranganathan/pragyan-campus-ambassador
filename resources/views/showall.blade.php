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
<div class="col-sm-10">
@foreach($users as $user)
<div class="panel panel-primary">
<div class="panel-heading">
{{$user->full_name}}, {{$user->college}}, {{$user->city}}
</div>
<div class="panel-body">
<div class="col-sm-9">
Department : {{$user->dept}}<br>
Year : {{$user->year}}<br>
Mobile : {{$user->mobile}}<br>
Email : {{$user->email}}
</div>
<div class="col-sm-3">

<button class= "btn btn-primary" data-toggle="modal" data-target="#modal{{$user->id}}">See questionnaire</button>
@if($user->approved == 0)
<a href={{ action('UserController@approve', array("id"=>$user->id)) }}><button class= "btn btn-success">Approve</button></a>
<a href={{ action('UserController@reject', array("id"=>$user->id)) }}><button class= "btn btn-danger">Reject</button></a>
@elseif($user->approved == 1)
<a href={{ action('UserController@reject', array("id"=>$user->id)) }}><button class= "btn btn-danger">Reject</button></a>
@else
<a href={{ action('UserController@approve', array("id"=>$user->id)) }}><button class= "btn btn-success">Approve</button></a>
@endif
</div>
</div>
</div>

<div id="modal{{$user->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{$user->full_name}}, {{$user->college}}, {{$user->city}}</h4>
      </div>
      <div class="modal-body">
        <b>Position(s) of responsibility help (if any)</b>
        <p>{!! str_replace("\n","<br>", $user->por) !!}</p>
      	<b>Why are you applying for this post? </b>
        <p>{!! str_replace("\n","<br>", $user->question) !!}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endforeach
{!! $users->render() !!}					




</div>
</div>
</section>
@stop