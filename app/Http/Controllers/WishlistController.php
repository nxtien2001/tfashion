<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addtowishlist($id)
    {
        if (Auth::check()) {
            Wishlist::insert([
                'product_id' => $id,
                'user_id' => Auth::id()
            ]);
            return redirect()->back()->with('success', 'Thêm vào danh sách yêu thích thành công!');
        } else {
            return redirect()->route('getLogin')->with('message', 'Bạn chưa đăng nhập');
        }
    }
    public function wishPage()
    {
        $categories = Category::where('status', 1)->where('parent_id', 0)->orderBy('id', 'ASC')->get();
        $wishlists = Wishlist::where('user_id', Auth::id())->latest()->get();
        return view('pages.wishlist', compact('wishlists', 'categories'));
    }
    public function destroy($id)
    {
        Wishlist::where('id', $id)->where('user_id', Auth::id())->delete();
        return redirect()->back()->with('message', 'Đã xóa sản phẩm khỏi danh sách yêu thích!');
    }
}
