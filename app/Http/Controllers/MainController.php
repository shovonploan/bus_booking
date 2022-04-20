<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


use App\Models\user;
use App\Models\bus;
use App\Models\ticket;

class MainController extends Controller
{

    public function endName()
    {
        while (Session::has('name')) {
            Session::forget('name');
        }
    }
    public function endRoute()
    {
        while (Session::has('route')) {
            Session::forget('route');
        }
        while (Session::has('routeT')) {
            Session::forget('routeT');
        }
    }
    public function endBusId()
    {
        while (Session::has('id')) {
            Session::forget('id');
        }
    }
    public function index()
    {
        $this->endRoute();
        $this->endBusId();
        $buses = Bus::all();
        return view('index', compact('buses'));
    }

    public function login()
    {
        return view('login');
    }

    public function loginCheck(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'password' => 'required',
        ], [
            'name.required' => 'We need to know your name',
            'password.required' => 'We need to know your password address!'
        ]);
        if ($validator->fails()) {
            return
                Redirect::back()->withErrors($validator)
                ->withInput();
        } else {
            $userdata = array(
                'name' => $request->input('name'),
                'password' => $request->input('password'),
            );
            if (Auth::attempt($userdata)) {
                // TODO : Role
                // $role = User::where('name', '=', 'admin');
                // dd($role);
                // $value =Session::put(['name' => $request->input('name'), 'role' => $role]);
                $value = Session::put(['name' => $request->input('name')]);
                return
                    Redirect::to('');
            } else {
                return Redirect::to('login');
            }
        }
    }


    public function register()
    {
        return view('register');
    }
    public function registerData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'password' => 'required',
            'address' => 'required',
            'number' => 'required|max:11|min:11'
        ]);
        if ($validator->fails()) {
            return
                Redirect::back()->withErrors($validator)
                ->withInput();
        } else {
            $credentials = array(
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'number' => $request->number,
                'roll' => 2
            );
            User::create($credentials);
            return Redirect::to('login');
        }
    }

    public function logOut()
    {
        Auth::logout();
        $this->endName();
        $this->endRoute();
        $this->endBusId();
        return Redirect::to('');
    }

    public function booking()
    {
        $this->endRoute();
        $this->endBusId();
        return view('booking');
    }

    public function bookingSearch(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'From' => 'required|max:255',
            'To' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return
                Redirect::back()->withErrors($validator)
                ->withInput();
        } else {
            $buses = Bus::all();
            $bus_id = array();
            foreach ($buses as $bus) {
                $str = $bus->routes;
                if (strpos($str, $request->input('From')) && strpos($str, $request->input('To'))) {
                    array_push($bus_id, $bus->id);
                }
            }
            $Rbuses = Bus::whereIn('id', $bus_id)->get();
            if (empty($Rbuses))
                return Redirect::back()->withErrors(['msg' => 'No Bus found']);
            $this->endRoute();
            Session::put(['route' => $request->input('From')]);
            Session::put(['routeT' => $request->input('To')]);
            return view('booking', compact('Rbuses'));
        }
    }

    public function booked($id)
    {
        Session::put(['id' => $id]);
        return view('confirm');
    }
    public function bookedCancel($id)
    {
        Ticket::where('id', $id)->delete();
        $user_id = User::where('name', Session::get('name'))->first();
        $tickets = Ticket::where('user_id', $user_id->id)->get();
        $bus_id = array();
        foreach ($tickets as $ticket) {
            array_push($bus_id, $ticket->bus_id);
        }
        $buses = Bus::whereIn('id', $bus_id)->get();
        return view('showTickets', compact('tickets', 'buses'));
    }

    public function back()
    {
        $this->endBusId();
        $buses = Bus::all();
        $bus_id = array();
        foreach ($buses as $bus) {
            $str = $bus->routes;
            if (strpos($str, Session::get('route')) && strpos($str, Session::get('route'))) {
                array_push($bus_id, $bus->id);
            }
        }
        $Rbuses = Bus::whereIn('id', $bus_id)->get();
        if (empty($Rbuses))
            return Redirect::back()->withErrors(['msg' => 'No Bus found']);
        return view('booking', compact('Rbuses'));
    }

    public function confirmBooked(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return
                Redirect::back()->withErrors($validator)
                ->withInput();
        } else {
            if ($request->input('date') < date("Y-m-d")) {
                return Redirect::back()->withErrors(['msg' => 'Date Not Available']);
            }
            $user_id = User::where('name', Session::get('name'))->first();
            $credentials = array(
                'user_id' => $user_id->id,
                'bus_id' => Session::get('id'),
                'dept' => $request->input('date'),
            );
            Ticket::create($credentials);

            $this->endRoute();
            $this->endBusId();
            return Redirect::to('http://bus_booking.test/booking')->withErrors(['msg' => 'Ticket Purchased']);
        }
    }

    public function showTickets()
    {
        $this->endRoute();
        $this->endBusId();
        $user_id = User::where('name', Session::get('name'))->first();
        DB::table('tickets')->where('dept', '<', date("Y-m-d"))->delete();
        $tickets = Ticket::where('user_id', $user_id->id)->get();
        $bus_id = array();
        foreach ($tickets as $ticket) {
            array_push($bus_id, $ticket->bus_id);
        }
        $buses = Bus::whereIn('id', $bus_id)->get();
        return view('showTickets', compact('tickets', 'buses'));
    }

    public function showPurchased()
    {
        $this->endRoute();
        $this->endBusId();
        DB::table('tickets')->where('dept', '<', date("Y-m-d"))->delete();
        $tickets = Ticket::all();
        $bus_id = array();
        foreach ($tickets as $ticket) {
            array_push($bus_id, $ticket->bus_id);
        }
        $buses = Bus::whereIn('id', $bus_id)->get();
        $user_id = array();
        foreach ($tickets as $ticket) {
            array_push($user_id, $ticket->user_id);
        }
        $users = User::whereIn('id', $user_id)->get();
        return view('showPurchased', compact('tickets', 'buses', 'users'));
    }

    public function profile($name)
    {
        $this->endRoute();
        $this->endBusId();
        if (Session::get('name') != $name)
            return Redirect::to('');
        $user = User::where('name', $name)->first();
        return view('profile', compact('user'));
    }
}