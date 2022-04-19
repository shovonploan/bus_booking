@extends('main')

@section('css')
http://bus_booking.test/style.css
@endsection

@section('js')
http://bus_booking.test/script.js
@endsection

@section('body')
@if(session()->has('name'))
<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end" id="sidebar-wrapper" style="background-color: rgba(204,229,255);">
        <div class="sidebar-heading border-bottom bg-light"></i><a href="{{route('home')}}" style="
                                    text-decoration: none;
                                    text-align: center;
                                    display: inline-block; color:black"><i class="fa fa-bus"
                    style="padding-right: 1rem;"></i>Bus
                Booking</a>
        </div>
        <div class=" list-group list-group-flush">
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('booking')}}">Book
                Bus</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3"
                href="{{route('showTickets')}}">Show Tickets</a>
            @if(session()->get('name')=='admin')
            <a class="list-group-item list-group-item-action list-group-item-light p-3"
                href="{{route('showPurchased')}}">Ticket
                Purchased</a>
            @endif
        </div>
    </div>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar navbar-expand-lg navbar-light border-bottom" style="background-color: rgba(204,229,255);">
            <div class="container-fluid">
                <button class="btn" id="sidebarToggle"><i class="fa fa-bars"></i></button>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">{{strtoupper(session()->get('name'))}}</a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#!">Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('logOut')}}">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container-fluid">
            @yield('main_content')
        </div>
    </div>
</div>
@else
<div id="page-content-wrapper"
    style="background-image: linear-gradient(to right,rgba(0,128,255),rgba(51,153,255),rgba(102,178,255),rgba(153,204,255),rgba(0,102,255) );">
    <!-- Top navigation-->
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="p-4" style="background-color: rgba(204,229,255);">
            <a href="{{route('login')}}" class="nav-link">login</a><a href="{{route('register')}}"
                class="nav-link">register</a>
        </div>
    </div>
    <nav class="navbar" style="background-color: rgba(204,229,255);">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="background-color: rgba(204,255,204);"></span>
            </button>
        </div>
    </nav>
    <!-- Page content-->
    <div class="container-fluid">
        @yield('main_content')
    </div>
</div>
@endif

@include('footer')

@endsection
