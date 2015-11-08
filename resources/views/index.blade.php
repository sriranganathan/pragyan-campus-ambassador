@extends('base')

@section('topbar')

<li class="hidden">
    <a href="#page-top"></a>
</li>
<li>
    <a class="page-scroll" href="#about">Intro</a>
</li>
<li>
    <a class="page-scroll" href="#download">About</a>
</li>
<li>
    <a class="page-scroll" href="#contact">Benefits</a>
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
    <a class="page-scroll" href="#register">Register/Login</a>
</li>
@endif
@stop

@section('content')

	<!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">Pragyan Campus Ambassador</h1>
                        <p class="intro-text">Be the one...</p>
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Brief introduction</h2>
                <p>Pragyan is the annual International Tech-management event conducted by the National
Institute of Technology Tiruchirappalli. During the month of January or February, students
from over 150+ colleges around India, make their mark in this event through the various
Coding, Robotics, Management, Core Engineering, Paper presentations and much more
events.</p>
<p>Pragyan this year offers the opportunity for students from colleges around India, to have
a role that defines the very event manner of Pragyan. A representative from each college
will be chosen to promote and publicize their college for Pragyan.</p>
            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section id="download" class="content-section">
        <div class="download-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">
                    <center><h2>Why should you be the Campus Ambassador for Pragyan?</h2></center>
                    <li>Spread the information regarding Pragyan in their college in order for the college to
achieve the maximum participation level possible.</li>
<li>Promote Pragyan through social media such as Facebook, Twitter and YouTube etc. to
enhance the quality of Pragyan’s overall participation.</li>
<li>Coordinate with Pragyan Publicity Team & other campus ambassadors to spread
awareness about events of Pragyan on various websites.</li>
<li>Provide contacts of all the technical/management/quizzing clubs of the college to give
your college a chance to test their mettle among 150+ more colleges.</li>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="container content-section ">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <center><h2>Benefits of being a campus ambassador</h2></center>
                <li>Opportunity to collaborate with, and be a part of a network of thousands of students
from across the country.</li>
<li>Certificate of Appreciation from Pragyan.</li>
<li>Unique opportunity for students to enhance their skills in the fields of leadership,
publicity, marketing, networking, and maintaining public relations at a national level.</li>
<li>Benefits on services such as travels, restaurants, application charges etc. during the
course of work for the Campus Ambassador program.</li>
<li>4 campus ambassador shall be chosen to be the BEST Campus Ambassadors every
month.</li>
            </div>
        </div>
    </section>
@if (Session::has('admin')||Session::has('fbid'))
 
@else
<section id="register" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Register to be a campus ambassador</h2>
                <p>
                <a href="{{$login_url}}"><img src="{{asset('img/fb_login.png')}}"></a>
                </p>
            </div>
        </div>
    </section>
@endif
    

    

@stop


