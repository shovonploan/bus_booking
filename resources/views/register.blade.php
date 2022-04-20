@extends('main')

@section('title')
Register
@endsection
@section('body')
<div class="bg-image shadow-2-strong" style="background-image: url(http://bus_booking.test/images/bus_bg_01.jpg
    );background-repeat: no-repeat; height: 100vh;">
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.4); height: 100vh;">
        <div class="container"
            style="width:400px;height:480px;float:right; margin-top:10%; margin-right:15%; border-radius: 10px; background-color: rgba(255, 255, 255, 0.7);">
            <div class="container d-flex align-items-center justify-content-center text-center h-100">
                <form method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="py-1 fa fa-at"
                                    style="height:25px"></i></span>
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
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="py-1 fa fa-map" style="height:25px"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="address" aria-label="address"
                            aria-describedby="basic-addon1" name="address">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="py-1 fa fa-address-book"
                                    style="height:25px"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="number" aria-label="number"
                            aria-describedby="basic-addon1" name="number">
                    </div>
                    <input type="submit" value="Register">
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
