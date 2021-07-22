<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function getLogin()
    {
        $categories = Category::where('status', 1)->where('parent_id', 0)->orderBy('id', 'ASC')->get();
        return view('pages.login', compact('categories'));
    }
    public function postLogin(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);


        if ($validator->fails()) {
            return redirect('login')->withErrors($validator)->withInput();
        } else {
            $email = $request->input('email');
            $password = $request->input('password');
            if (Auth::attempt(['email' => $email, 'password' => $password, 'role_id' => 1])) {
                return redirect('/dashboard');
            } elseif (Auth::attempt(['email' => $email, 'password' => $password, 'role_id' => 0])) {
                return redirect()->route('home');
            } else {
                Session::flash('error', 'Email hoặc mật khẩu không đúng!');
                return redirect()->route('getLogin');
            }
        }
    }
    public function getLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
