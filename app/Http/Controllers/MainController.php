<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\Validates\Requests;
use Illuminate\Foundation\AuthAccess\Authorizes\Resources;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Models\user;
use App\Models\bus;

class MainController extends Controller
{

    public function index()
    {
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
            'number' => 'required|max:11'
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
        Session::forget('name');
        return Redirect::to('');
    }
}
