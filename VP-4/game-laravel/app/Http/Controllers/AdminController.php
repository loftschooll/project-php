<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Auth;
use vendor\project\StatusTest;

class AdminController extends Controller
{
    public function login(Request $request) {
        if($request->isMethod('post')) {
            $data = $request->input();
            $adminCount = Admin::where(['username' => $data['username'], 'password' => md5($data['password']), 'status' => '1'])->count();
            if($adminCount > 0) {
                Session::put('adminSession', $data['username']);
                return redirect('admin/admin_index');
            } else {
                return redirect('/admin')->with('flash_message_error', 'Неправильный логин и пароль');
            }
        }
        return view('admin.admin_login');
    }

    public function index() {
        return view('admin.admin_index');
    }

    public function chkPassword(Request $request) {
        $data = $request->all();
        $adminCount = Admin::where(['username' => Session::get('adminSession'), 'password' => md5($data['current_pwd'])])->count();
        if ($adminCount == 1) {
            echo "true"; die;
        } else {
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request) {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $adminCount = Admin::where(['username' => Session::get('adminSession'), 'password' => md5($data['current_pwd'])])->count();
            if ($adminCount == 1) {
                $password = md5($data['new_pwd']);
                Admin::where('username', Session::get('adminSession'))->update(['password' => $password]);
                return redirect('/admin/settings')->with('flash_message_success', 'Пароль обновлен успешно');
            } else {
                return redirect('/admin/settings')->with('flash_message_error', 'Произошла ошибка!!!');
            }
        }
    }

    public function settings() {
        $adminDetails = Admin::where(['username' => Session::get('adminSession')])->first();
        return view('admin.settings')->with(compact('adminDetails'));
    }

    public function logout() {
        Session::flush();
        return redirect('/admin')->with('flash_message_success', 'Вышли из админки');
    }
}
