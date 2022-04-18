@extends('template')


@section('css')
http://bus_booking.test/style.css
@endsection

@section('js')
http://bus_booking.test/script.js
@endsection

@section('title')
Bus Booking
@endsection

@section('main_content')
@foreach($buses as $bus)
<p>{{$bus->name}}</p>
@endforeach
@endsection
