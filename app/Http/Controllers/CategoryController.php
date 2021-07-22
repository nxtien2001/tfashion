<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $cateChildrent = Category::where('parent_id', 0)->orderBy('id', 'DESC')->get();
        $categories = Category::latest()->paginate(10);
        if ($key = request()->key) {
            $categories = Category::latest()->where('name', 'like', '%' . $key . '%')->paginate(15);
        }
        return view('admin.category.index', compact('categories', 'cateChildrent'));
    }
    public function create()
    {
        $category = Category::where('parent_id', 0)->get();
        return view('admin.category.add', compact('category'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:30',
            'slug' => 'required|unique:categories|max:25'
        ], [
            'name.required' => 'Tên danh mục không được để trống!',
            'name.max' => 'Tên danh mục không được quá 30 kí tự!',
            'slug.required' => 'Đường dẫn không được để trống!',
            'slug.max' => 'Đường dẫn không được quá 25 kí tự!'
        ]);
        Category::create($request->all());
        return redirect()->back()->with('success', 'Thêm mới danh mục thành công!');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:30',
            'slug' => 'required'
        ], [
            'name.required' => 'Tên danh mục không được để trống!',
            'name.max' => 'Tên danh mục không được quá 30 kí tự!',
            'slug.required' => 'Đường dẫn không được để trống!'
        ]);
        $cate_id = $request->id;
        Category::find($cate_id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status
        ]);
        return redirect()->back()->with('success', 'Cập nhật danh mục thành công!');
    }
    public function delete($id)
    {
        Category::find($id)->delete();
        return redirect()->back()->with('message', 'Xóa dữ liệu thành công!');
    }
    public function activeCate($category_id)
    {
        DB::table('categories')->where('id', $category_id)->update(['status' => 0]);
        return redirect()->back()->with('actived', 'Bỏ kích hoạt thành công!');
    }
    public function unactiveCate($category_id)
    {
        DB::table('categories')->where('id', $category_id)->update(['status' => 1]);
        return redirect()->back()->with('active', 'Kích hoạt thành công!');
    }
}
