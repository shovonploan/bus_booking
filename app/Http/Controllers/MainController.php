<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\Validates\Requests;
use Illuminate\Foundation\AuthAccess\Authorizes\Resources;
use Illuminate\Support\Facades\Auth;
use Input;

use App\Models\user;


class MainController extends Controller
{

    public function index()
    {
        return view('index');
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
            // attempt to do the login
            if (Auth::attempt($userdata)) {
                return view('home');
            } else {
                // validation not successful, send back to form
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
}