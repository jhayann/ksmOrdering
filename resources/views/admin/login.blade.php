@extends('layouts.adminlayout')

@section('styles')
    <style type="text/css">
        body {
        margin:0;
        }
        .right, .left 
        {
            height: 100vh;
        }
        .right 
        {
            background-image: url('{{ URL::to('img/water1.jpg') }}');
            background-size: 100% 100%;
        }
        .left
        { 
            padding-top: 16%;    
            background-color:#71cce2;
        }
        .row 
        {
        max-width: 100%;
        }
        .card-body
        {
            width:60%;
            margin: auto;
        }
        .card-img-top
        {
            max-height: 200px;
        }
        .title
        {
            width: 100%;
              position: relative;
              z-index: 1;
              display: -webkit-box;
              display: -webkit-flex;
              display: -moz-box;
              display: -ms-flexbox;
              display: flex;
              flex-wrap: wrap;
              flex-direction: column;
              align-items: center;
            background-image:url('{{ URL::to('img/header.jpg') }}');
                 background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
            height: 200px;
            padding-top: 90px;
        }
        .title-1
        {
          font-family:impact;
          font-size: 30px;
          color: #14fffb;
          text-transform: uppercase;
          line-height: 1.2;
          text-align: center;
            
        }
        .card, .title
        {
            border-radius: 10px;
        }
        @media (max-width:720px)
        {
            .right  {
                display: none;
            }
        }

    </style>
@endsection

@section('contents')
<div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg> 
</div>
<div class="row" id="main-">
    <div class="col-md-6 right ">
    </div>
    <div class="col-md-6 left">
       <div class="card">
           <div class="title">
                   <p class="title-1" style="text-shadow: 5px 5px 20px #0b6aa8;">SIGN INs</p>
           </div>
            <div class="card-body">
       <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" onclick="register()" class="btn btn-primary btn-block">Login</button>
        </form>
            </div>

        </div>
    </div>
</div>
@endsection