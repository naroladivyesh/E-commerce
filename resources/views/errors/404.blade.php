@extends('layouts.frontLayout.front_design')

@section('content')
    
        <div class="container text-center">
           <div class="content-404">
                {{-- <img src="{{asset('images/frontend_images/404/404.png')}}" class="img-responsive" alt="" /> --}}
                <h1><b>OPPS!</b> We Couldn’t Find this Page</h1>
                <p>This page is <b>Under Construction by Developer</b> or This page is not yet complete </p>
                <h2><a href="{{ url('/')}}">Bring me back Home</a></h2>
                <br>
            </div>
        </div>

@endsection 