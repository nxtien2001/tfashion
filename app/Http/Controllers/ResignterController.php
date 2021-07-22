<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class ResignterController extends Controller
{
    public function getResign()
    {
        $categories = Category::where('status', 1)->where('parent_id', 0)->orderBy('id', 'ASC')->get();
        return view('pages.resignter', compact('categories'));
    }
    public function postResign(Request $request)
    {
        $user = new User();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'role_id' => 0
        ]);
        $user->save();
        if ($user->id) {
            return redirect()->route('getLogin')->with('success', 'Đăng kí tài khoản thành công! Vui lòng đăng nhập');
        }
        return redirect()->back();
    }
}
