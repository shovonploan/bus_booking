@extends('template')

@section('title')
Ticket Booked
@endsection

@section('main_content')
<div class="bg-image shadow-2-strong" style="background-image: url(http://bus_booking.test/images/bus_bg_03.jpg
    );background-repeat: no-repeat; height: 100vh;">
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.4); height: 100vh;">
        <div class="container">
            <div class="text-center" style="padding-top:30px;">
                <h1 class="text-light" style="font-size: 4rem; font-weight: bold;">Tickets</h1>
            </div>
        </div>
        <div class="container p-5">
            <table class="table" style="opacity: 0.9;">
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
                                    href="http://bus_booking.test/bookedCancel/{{$ticket->id}}" class="text-light"
                                    style="
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
</div>

@endsection
