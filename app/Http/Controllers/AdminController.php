<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function AuthLogin()
    {
        $id = Session::get('id');
        if (isset($id)) {
            return redirect('admin.dashboard');
        } else {
            return redirect('/admin')->send();
        }
    }
    public function index()
    {
        return view('login');
    }
    public function show_dashboard()
    {
        $this->AuthLogin();
        return view('admin.dashboard');
    }
    public function dashboard(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $result  = DB::table('tbl_admin')->where('email', $email)->where('password', $password)->first();
        if ($result) {
            session::put('name', $result->name);
            session::put('id', $result->id);
            return redirect('/dashboard');
        } else {
            session()->flash('success', 'Tài khoản hoặc mật khẩu không chính xác!');
            return redirect('/admin');
        }
    }
    public function logout()
    {
        Session::put('name', null);
        Session::put('id', null);
        return redirect('/admin');
    }
}
