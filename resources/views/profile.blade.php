@extends('template')

@section('title')
{{strtoupper(session()->get('name'))}}
@endsection

@section('main_content')
<div class="bg-image shadow-2-strong" style="background-image: url(http://bus_booking.test/images/bus_bg_05.jpg
    );background-repeat: no-repeat; height: 100vh;">
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.4); height: 100vh;">
        <div class="container">
            <div class="text-center" style="padding-top:30px;">
                <h1 class="text-light" style="font-size: 4rem; font-weight: bold;">
                    {{strtoupper(session()->get('name'))}}</h1>
            </div>
        </div>
        <div class="container p-5">
            <div class="container"
                style="border-radius: 10px; background-color: rgba(255, 255, 255, 0.7); margin-bottom: 8rem; width:50%;">
                <div class="container d-flex align-items-center justify-content-center text-center h-100">
                    <div class="card-body p-1 mt-3">
                        <p class="card-text">Name : {{$user->name}}</p><br>
                        <p class="card-text">Address : {{$user->address}}</p><br>
                        <p class="card-text">Number : {{$user->number}}</p><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
