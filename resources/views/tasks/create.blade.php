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
      <textarea class="form-control" name="description" id="editor1" placeholder="Task Description" rows="20" required></textarea>
    </div>
  </div>

  <script src={{asset("ckeditor\ckeditor.js")}}></script>
  <script>
     CKEDITOR.replace( 'editor1', {
    on: {
        instanceReady: function( ev ) {
            this.enterMode = CKEDITOR.ENTER_BR,

            // Output paragraphs as <p>Text</p>.
            this.dataProcessor.writer.setRules( 'p', {
                indent: false,
                breakBeforeOpen: false,
                breakAfterOpen: false,
                breakBeforeClose: false,
                breakAfterClose: false
            });
        }
    }

});
  </script>

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

