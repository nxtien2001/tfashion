<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Attribute;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductAttr;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        if ($key = request()->key) {
            $products = Product::latest()->where('name', 'like', '%' . $key . '%')->paginate(10);
        }
        return view('admin.product.index', compact('products'));
    }
    public function create()
    {
        $brand = Brand::all();
        $category = Category::where('parent_id', 0)->get();
        $color = Attribute::where('name', 'color')->get();
        $size = Attribute::where('name', 'size')->get();
        return view('admin.product.add', compact('category', 'color', 'size', 'brand'));
    }
    public function store(Request $request)
    {
        $products = new Product;
        $request->validate([
            'name' => 'required|unique:products|max:50',
            'price' => 'required|max:8',
            'sale_price' => 'required|max:8',
            'code' => 'required|max:10',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
            'slug' => 'required|unique:products|max:35',
            'category_id' => 'required',
            'brand_id' => 'required',
            'quantity' => 'required|max:5',
            'id_attr' => 'required:product_attrs',
            'short_content' => 'required|max:1000',
            'long_content' => 'required|min:100',
        ]);
        if ($request->hasFile('image')) {
            //get filename with extension
            $filenamewithextension = $request->file('image')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('image')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . time() . '.' . $extension;

            //Upload File
            $request->file('image')->storeAs('public/upload', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('upload/product/' . $filenametostore);
            $msg = 'Upload ảnh thành công';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
        // $newImage = time() . '-' . $request->name . '.' .
        //     $request->image->extension();
        // $request->image->move(public_path('upload/product'), $newImage);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('upload/product'), $filename);
            $products->image = $filename;
        }
        $product =  Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'code' => $request->code,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'quantity' => $request->quantity,
            'slug' => strtolower(str_replace('', '-', $request->name)),
            'short_content' => $request->short_content,
            'image' => $filename,
            'long_content' => $request->long_content,
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            'updated_at' => null,
        ]);
        // dd($request->id_attr);
        foreach ($request->id_attr as $value) {
            ProductAttr::create([
                'id_product' => $product->id,
                'id_attr' => $value,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at' => null,
            ]);
        }
        return redirect()->back()->with('success', 'Thêm mới sản phẩm thành công!');
    }
    public function edit($id)
    {
        $brand = Brand::all();
        $category = Category::all();
        $color = Attribute::where('name', 'color')->get();
        $size = Attribute::where('name', 'size')->get();
        $products =  Product::find($id);
        return view('admin.product.edit', compact('category', 'color', 'size', 'brand', 'products'));
    }
    public function update(Request $request, $id)
    {
        $products = new Product;
        $request->validate([
            'name' => 'required|unique:products|max:50',
            'price' => 'required|max:8',
            'sale_price' => 'required|max:8',
            'code' => 'required|max:10',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
            'slug' => 'required|unique:products|max:35',
            'category_id' => 'required',
            'brand_id' => 'required',
            'quantity' => 'required|max:5',
            'id_attr' => 'required:product_attrs',
            'short_content' => 'required|max:300',
            'long_content' => 'required|min:100',
        ]);
        if ($request->hasFile('image')) {
            //get filename with extension
            $filenamewithextension = $request->file('image')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('image')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . time() . '.' . $extension;

            //Upload File
            $request->file('image')->storeAs('public/upload', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('upload/product/' . $filenametostore);
            $msg = 'Upload ảnh thành công';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('upload/product'), $filename);
            $products->image = $filename;
        }
        Product::find($id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'code' => $request->code,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'quantity' => $request->quantity,
            'slug' => strtolower(str_replace('', '-', $request->name)),
            'short_content' => $request->short_content,
            'image' => $filename,
            'long_content' => $request->long_content,
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            'updated_at' => null,
        ]);
        return redirect()->back()->with('success', 'Cập nhật sản phẩm thành công!');
    }
    public function delete($id)
    {
        Product::find($id)->delete();
        return redirect()->back()->with('message', 'Xóa dữ liệu thành công!');
    }
}
