@extends('base')

@section('topbar')

<style>
blockquote {
    padding: 35px 35px 25px 35px;
    border: none;
    quotes: "\201C" "\201D";
    display: inline-block;
    position: relative;
    margin-bottom: 0px;
}

blockquote:before { 
    content: open-quote;
    font-size:2em;
    font-weight: bold;
    position:absolute;
    top:0;
    left: 0;
} 
blockquote:after { 
    content: close-quote;
    font-size:2em;
    font-weight: bold;
    position:absolute;
    bottom:0; right: 0;
}

</style>

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
                <blockquote style="text-align:center; font-size:1.45em;">
                    Innovation needs preparation, collaboration and the light of the soul. Every challenge provides that light - a greater depth of understanding about life and truth.
                </blockquote>
                <em><p style="text-align:right">― Amit Ray, Enlightenment Step by Step</p></em>
                <p style="text-align:justify;">
                Pragyan Campus Ambassador is an initiative by Pragyan which allows representatives from various colleges to be a part of the organization and help with internal publicity in their respective colleges. It is an opportunity to be a part of a student collaboration that extends all over the country. Furthermore, it helps the students in enhancing their skills in the fields of leadership, publicity, marketing, networking and maintaining public relations at a national level.
                </p>
                <p style="text-align:justify;">
                The tasks given to PCAs include sharing of posters on social media platforms, and they will be judged and rewarded based on their performances, apart from which, a certificate of appreciation shall be given by Pragyan to all the PCAs.
                </p>
            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section id="download" class="content-section">
        <div class="download-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">
                    <center><h2>Why should you be the Campus Ambassador for Pragyan?</h2></center>
                    <li class="yes">Spread the information regarding Pragyan in their college in order for the college to
achieve the maximum participation level possible.</li>
<li class="yes">Promote Pragyan through social media such as Facebook, Twitter and YouTube etc. to
enhance the quality of Pragyan’s overall participation.</li>
<li class="yes">Coordinate with Pragyan Publicity Team & other campus ambassadors to spread
awareness about events of Pragyan on various websites.</li>
<li class="yes">Provide contacts of all the technical/management/quizzing clubs of the college to give
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
                <li class="yes">Opportunity to collaborate with, and be a part of a network of thousands of students
from across the country.</li>
<li class="yes">Certificate of Appreciation from Pragyan.</li>
<li class="yes">Unique opportunity for students to enhance their skills in the fields of leadership,
publicity, marketing, networking, and maintaining public relations at a national level.</li>
<li class="yes">Benefits on services such as travels, restaurants, application charges etc. during the
course of work for the Campus Ambassador program.</li>
<li class="yes">4 campus ambassadors shall be chosen to be the BEST Campus Ambassadors every
month plus a lot more incentives to look forward to.</li>
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


