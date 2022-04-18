@extends('main')

@section('body')
@if(session()->has('name'))
<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end" id="sidebar-wrapper" style="background-color: rgba(153,153,255);">
        <div class="sidebar-heading border-bottom bg-light">Bus Booking
        </div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Dashboard</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Status</a>
        </div>
    </div>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar navbar-expand-lg navbar-light border-bottom" style="background-color: rgba(153,153,255);">
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
@yield('main_content')

@endif

@include('footer')

@endsection
