@extends('template')

@section('title')
Bus Booking
@endsection

@section('main_content')
<div
    style="background-image: linear-gradient(to right,rgba(0,128,255),rgba(51,153,255),rgba(102,178,255),rgba(153,204,255),rgba(0,102,255) );width:100%;">
    <div class="container">
        <div class="text-center" style="padding-top:30px;">
            <h1 class="">Bus Booking</h1>
            <h2 style="padding-top:20px">Available Buses</h2>
        </div>
    </div>
    <div class="container p-5">
        <table class="table" style="opacity: 0.8;">
            <thead class="table-success">
                <tr>
                    <th scope="col" class="text-center">Bus Name</th>
                    <th scope="col" class="text-center">Routes</th>
                    @if(session()->has('name'))
                    <th scope="col"></th>
                    @endif
                </tr>
            </thead>
            <tbody class="table-secondary">
                @foreach($buses as $bus)
                <tr>
                    <td>{{$bus->name}}</td>
                    <td>{{$bus->routes}}</td>
                    @if(session()->has('name'))

                    <td><button class="btn btn-primary"><a href="{{route('booking')}}" class="text-light">Book
                                Now</a></button></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
