<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $topProducts = Product::limit(5)->orderBy('id', 'DESC')->get();
        $slider = Slider::all();
        $categories = Category::where('status', 1)->where('parent_id', 0)->orderBy('id', 'ASC')->get();
        $sale_products = Product::where('sale_price', '>', 0)->limit(5)->orderBy('id', 'DESC')->get();
        if ($key = request()->key) {
            $topProducts = Product::latest()->where('name', 'like', '%' . $key . '%')->paginate(10);
        }
        return view('welcome', compact('topProducts', 'categories', 'sale_products', 'slider'));
    }
    public function view($id)
    {
        $model = Category::where('id', $id)->first();
        $product = Product::where('id', $id)->first();
        $categories = Category::where('status', 1)->where('parent_id', 0)->orderBy('id', 'ASC')->get();
        if ($model) {
            return view('pages.category', ['model' => $model, 'categories' => $categories]);
        } elseif ($product) {
            return view('pages.detail-product', ['model' => $product, 'categories' => $categories]);
        } else {
            return view('pages.404');
        }
    }
    public function addtowishlist($id)
    {
        dd($id);
    }
}
