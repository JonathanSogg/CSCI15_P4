@extends('main')
 
@section('navigation')
@parent
<li><a href="/about">About</a></li>
@endsection
 
@section('content')
<div class="hero-unit">
    <div class="row">
        <div class="span6">
            <h1>CSCI15 Project 4!</h1>
            <p>This is my simple photo sharing site inspired by things like imgur or photobucket</p>
            <p>You can share your own pics by uploading them and sharing the link</p>
            <p>Please don't share anything you don't own the copyright to!</p>
            <p><a href="about" class="btn btn-primary btn-large">Learn more &raquo;</a></p>
        </div>
         
        <div class="span4">
            <img src={{ URL::to('/') }}/img/camera.jpg alt="CSCI15" />
        </div>
    </div>
     
</div>
 
<!-- Example row of columns -->
<div class="row">
    <div class="span3">
        &nbsp;
    </div>
</div>
@endsection
