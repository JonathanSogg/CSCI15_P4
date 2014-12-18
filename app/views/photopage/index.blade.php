@extends('layout.main')

@section('content')
<div class="row">
    <div class="span3">
        <div class="well sidebar-nav">
            @include('photopage.profileButton')
            <ul class="nav nav-list">
                <li class="nav-header">Profile</li>
            </ul>
                <div style="margin-left: 10px">
                <div style="float: left; width: 220px; margin: 0px 3px 3px 5px;">
                <p>User: {{ $profile->name }}</p>
                <p>Bio: {{ $profile->profile_bio }}</p>
                </div>
                <div style="clear: both"></div>
                
                </div>
            </div>
    </div>    
    <div class="span9">
        <h1>Your Pictures</h1>
        <p><a href="{{ URL::route('logoff') }}">Logoff</a></p>
        @include('uploads.uploadButton')
        @forelse ($pictures as $picture)
        <div class="well" style="text-align: center">
            <img src="{{ url($picture->location) }}" alt="{{ $picture->description }}" title="{{ $picture->description }}" />
            <p>{{ $picture->description }}</p>
            <a href="{{ url($picture->location) }}">Direct Link</a>
            <p>----------------</p>
            <a href="{{ URL::route('delete', array('id' => $picture->id)) }}">Delete Picture</a>
        </div>
        @empty
        <div class="alert alert-info">
            <h4 class="alert-heading">Oh no!</h4>
            <p>No pictures yet.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
