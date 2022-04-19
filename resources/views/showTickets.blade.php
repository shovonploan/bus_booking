@extends('template')

@section('title')
All Tickets
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
        <table class="table">
            <thead class="table-success">
                <tr>
                    <th scope="col" class="text-center">Bus Name</th>
                    <th scope="col" class="text-center">Date</th>
                    <th scope="col" class="text-center">Cancel</th>
                </tr>
            </thead>
            <tbody class="table-secondary">
                @foreach($tickets as $ticket)
                <tr>
                    <td class="text-center">
                        @foreach($buses as $bus)
                        @if($bus->id===$ticket->bus_id)
                        {{$bus->name}}
                        @endif
                        @endforeach
                    </td>
                    <td class="text-center">{{$ticket->dept}}</td>
                    <td class="text-center"><button class="btn btn-danger"><a
                                href="http://bus_booking.test/bookedCancel/{{$ticket->id}}" class="text-light" style="
                                text-decoration: none;
                                display: inline-block;
                                ">Cancel Booking</a></button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if(count($tickets)==0)
        <h4 class="text-center" style="color:rgb(135, 0, 0);">No Ticket Purchased</h4>
        @endif
    </div>
</div>

@endsection
