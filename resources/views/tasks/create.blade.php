@extends('base')

@section('topbar')


@stop


@section('content')
    <section id="about" class="container content-section">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">

    <form class="form-horizontal" method="POST" action={{ action('TasksController@store')}}>
  <div class="form-group">
    <label class="control-label col-sm-2" for="title"><center>Title</center></label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="title" placeholder="Title" required>
    </div>
  </div>
 

  <div class="form-group">
    <label class="control-label col-sm-2" for="description"><center>Task Description</center></label>
    <div class="col-sm-10">
      <textarea class="form-control" name="description" placeholder="Task Description" rows="20" required></textarea>
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

