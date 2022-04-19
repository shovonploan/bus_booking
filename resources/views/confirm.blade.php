@extends('template')

@section('title')
Bus Booking
@endsection

@section('main_content')
<div class="bg-image shadow-2-strong" style="background-image: url(http://bus_booking.test/images/bus_bg_02.jpg
    );background-repeat: no-repeat; height: 100vh;">
    <div class=" mask d-flex align-items-center justify-content-center text-center row"
        style="background-color: rgba(0, 0, 0, 0.6); height: 100vh;">
        <div>
            <h1 class="text-center" style="color: rgba(255, 255, 102); font-size: 4rem; font-weight: bold;">
                Book
                Your
                Bus</h1>
        </div>
        <div class="container"
            style="border-radius: 10px; background-color: rgba(255, 255, 255, 0.7); margin-bottom: 8rem; width:50%;">
            <div class="container d-flex align-items-center justify-content-center text-center h-100">
                <form action="{{route('booked')}}" method="post">
                    @csrf
                    <h3 class="row">
                        Are You sure you want to buy ticket for this bus.</h3><br>
                    <p class="text-center">If yes chose date else go back.</p>
                    <div class="input-group mb-3">
                        <input type="date" class="form-control" aria-label="date" aria-describedby="basic-addon1"
                            name="date">
                    </div>
                    <div class="input-group mb-3 d-flex align-items-center justify-content-center">
                        <input type="submit" value="Confirm">
                        <div style="background-color: #ffffff;
                                                            color: white;
                                                            padding: 3px 20px;
                                                            margin-left: 4px;;
                                                             border-color: black;
                                                            border-width: 20px;">
                            <a href="{{route('back')}}"><span class="text-dark" style="
                                                            text-decoration: none;
                                                            text-align: center;
                                                            display: inline-block;
                                                            ">Go Back</span>
                            </a>
                        </div>
                    </div>
                    @if($errors->any())
                    @foreach ($errors->all() as $error)
                    <h4 style="color:red">{{ $error }}</h4>
                    @endforeach
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
