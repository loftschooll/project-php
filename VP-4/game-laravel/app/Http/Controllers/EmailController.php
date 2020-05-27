<?php

namespace App\Http\Controllers;

use App\Admin;
use Session;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index(Request $request)
    {
        $emails = Admin::all();
        return view('admin.email.index')->with(compact('emails'));
    }

    public function edit(Request $request, $id = null)
    {
        if($request->isMethod('post')) {
            $data = $request->all();

            Admin::where(['id' => $id])->update([
                'admin_email' => $data['admin_email'],
            ]);
            return redirect('/admin/email/index')->with('flash_message_success', 'Email для отправления заявок обновлен успешно!!!');
        }
        $emailDetails = Admin::where(['id' => $id])->first();
        return view('admin.email.edit')->with(compact('emailDetails'));
    }
}
