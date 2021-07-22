<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->where('parent_id', 0)->orderBy('id', 'ASC')->get();
        return view('pages.showcart', compact('categories'));
    }
    public function AddCart($id)
    {
        $products = Product::find($id);
        dd($products);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                'name' => $products->name,
                'price' => $products->sale_price ? $products->sale_price : $products->price,
                'quantity' => 1,
                'image' => $products->image
            ];
        }
        session()->put('cart', $cart);
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }
    public function ShowCart()
    {
        $categories = Category::where('status', 1)->where('parent_id', 0)->orderBy('id', 'ASC')->get();
        $carts = session()->get('cart');
        return view('pages.showcart', compact('carts', 'categories'));
    }
    public function UpdateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $carts = session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartComponent = view('pages.cart', compact('carts'))->render();
            return response()->json(['cart' => $cartComponent, 'code' => 200], 200);
        }
    }
    public function DeleteCart(Request $request)
    {
        if ($request->id) {
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartComponent = view('pages.cart', compact('carts'))->render();
            return response()->json(['cart' => $cartComponent, 'code' => 200], 200);
        }
    }
    public function getFormPay()
    {
        $carts = session()->get('cart');
        $categories = Category::where('status', 1)->where('parent_id', 0)->orderBy('id', 'ASC')->get();
        return view('pages.checkout', compact('categories', 'carts'));
    }
    public function getSaveInfo()
    {
    }
}
