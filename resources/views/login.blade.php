@extends('main')

@section('title')
Login
@endsection
@section('body')
<div class="bg-image shadow-2-strong" style="background-image: url(http://bus_booking.test/images/bus_bg.jpg
    );background-repeat: no-repeat; height: 100vh;">
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.4); height: 100vh;">
        <div class="container"
            style="width:400px;height:480px;float:right; margin-top:10%; margin-right:15%; border-radius: 10px; background-color: rgba(255, 255, 255, 0.7);">
            <div class="container d-flex align-items-center justify-content-center text-center h-100">
                <form method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <input type="text" class="form-control" placeholder="name" aria-label="name"
                            aria-describedby="basic-addon1" name="name">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="py-1 fa fa-lock"
                                    style="height:25px"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="password" aria-label="password"
                            aria-describedby="basic-addon1" name="password">
                    </div>
                    <div class="d-flex justify-content-around">
                        <input type="submit" value="Login">
                        <div style="background-color: #ffffff;
                                    color: white;
                                    padding: 10px 20px;
                                     border-color: black;
                                    border-width: 20px;">
                            <a href="{{route('register')}}"><span class="text-dark" style="
                                    text-decoration: none;
                                    text-align: center;
                                    display: inline-block;
                                    ">Register</span>
                            </a>
                        </div>
                    </div>
                    <div class="text-danger">
                        @if($errors->any())
                        {{ implode('', $errors->all(':message')) }}
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
