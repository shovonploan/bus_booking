@extends('template')

@section('title')
Bus Booking
@endsection

@section('main_content')
@if(session()->has('route'))
<div class="bg-image shadow-2-strong"
    style="background-image: linear-gradient(to right,rgba(0,128,255),rgba(51,153,255),rgba(102,178,255),rgba(153,204,255),rgba(0,102,255) );width:100%;height: 100%;">
    @else
    <div class="bg-image shadow-2-strong" style="background-image: url(http://bus_booking.test/images/bus_bg_02.jpg
    );background-repeat: no-repeat; height: 100vh;">
        @endif
        @if(session()->has('route'))
        <div class="mask d-flex align-items-center justify-content-center text-center row">
            @else
            <div class=" mask d-flex align-items-center justify-content-center text-center row"
                style="background-color: rgba(0, 0, 0, 0.6); height: 100vh;">
                @endif
                <div>
                    @if(session()->has('route'))
                    <h1 class="text-center" style="color: black; font-size: 4rem; font-weight: bold;">
                        @else
                        <h1 class="text-center" style="color: rgba(255, 255, 102); font-size: 4rem; font-weight: bold;">
                            @endif
                            Book
                            Your
                            Bus</h1>
                </div>
                <div class="container"
                    style="border-radius: 10px; background-color: rgba(255, 255, 255, 0.7); margin-bottom: 8rem; width:50%;">
                    <div class="container d-flex align-items-center justify-content-center text-center h-100">
                        <form action="{{route('bookingSearch')}}" method="post">
                            @csrf
                            <div class="input-group m-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        ></span>
                                </div>
                                <input type="text" class="form-control" placeholder="From" aria-label="From"
                                    aria-describedby="basic-addon1" name="From" style="margin-right: 5px;">

                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        < </span>
                                </div>
                                <input type="text" class="form-control" placeholder="To" aria-label="To"
                                    aria-describedby="basic-addon1" name="To" style="margin-right: 5px;">
                                <input type="submit" value="Search">
                            </div>
                            @if($errors->any())
                            @foreach ($errors->all() as $error)
                            @if($error==="Ticket Purchased")
                            <h4 style="color:rgb(0, 255, 250)">{{ $error }}</h4>
                            @else
                            <h4 style="color:red">{{ $error }}</h4>
                            @endif;
                            @endforeach
                            @endif
                            @if(session()->has('route'))
                            <div class="container py-1">
                                <table class="table">
                                    <thead class="table-success">
                                        <tr>
                                            <th scope="col" class="text-center">Bus Name</th>
                                            <th scope="col" class="text-center">Routes</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-secondary">
                                        @foreach($Rbuses as $bus)
                                        <tr>
                                            <td>{{$bus->name}}</td>
                                            <td>{{$bus->routes}}</td>
                                            @if(session()->has('name'))
                                            <td><button class="btn btn-primary"><a
                                                        href="http://bus_booking.test/booked/{{$bus->id}}"
                                                        class="text-light">Book
                                                        Now</a></button></td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endsection
