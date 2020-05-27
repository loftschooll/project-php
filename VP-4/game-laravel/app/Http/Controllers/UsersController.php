<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Session;

class UsersController extends Controller
{
    public function userRegister() {
        return view('user.user-register');
    }

    public function userLogin() {
        return view('user.user-login');
    }

    public function register(Request $request) {
        if($request->isMethod('post')) {
            $data = $request->all();
            $usersCount = User::where('email', $data['email'])->count();
            if($usersCount>0) {
                return redirect()->back()->with('flash_message_error', 'Email уже существует!!!');
            } else {
                $user = new User;
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->password = bcrypt($data['password']);
                $user->save();
                if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
                    Session::put('frontSession', $data['email']);
                    return redirect('/');
                }
            }
        }
    }

    public function login(Request $request) {
        if($request->isMethod('post')) {
            $data = $request->all();
            if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
                Session::put('frontSession', $data['email']);
                return redirect('/');
            } else {
                return redirect()->back()->with('flash_message_error', 'Неверна пара логин и пароль!!!');
            }
        }
    }

    public function logout() {
        Auth::logout();
        Session::forget('frontSession');
        return redirect('/');
    }
}
