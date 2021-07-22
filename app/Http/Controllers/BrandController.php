<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->paginate(10);
        if ($key = request()->key) {
            $brands = Brand::latest()->where('name', 'like', '%' . $key . '%')->paginate(10);
        }
        return view('admin.brand.index', compact('brands'));
    }
    public function create()
    {
        return view('admin.brand.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brand|max:30'
        ], [
            'name.required' => 'Thương hiệu không được để trống',
            'name.unique' => 'Thương hiệu đã tồn tại',
            'name.max' => 'Không được quá 30 kí tự'
        ]);
        Brand::insert([
            'name' => $request->name
        ]);
        return redirect()->back()->with('success', 'Thêm mới thương hiệu thành công!');
    }
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brand|max:30'
        ], [
            'name.required' => 'Thương hiệu không được để trống',
            'name.unique' => 'Thương hiệu đã tồn tại',
            'name.max' => 'Không được quá 30 kí tự'
        ]);
        $brand_id = $request->id;
        Brand::find($brand_id)->update([
            'name' => $request->name,
            'status' => $request->status
        ]);
        return redirect()->back()->with('success', 'Cập nhật danh mục thành công!');
    }
    public function delete($id)
    {
        Brand::find($id)->delete();
        return redirect()->back()->with('message', 'Xóa dữ liệu thành công!');
    }
    public function active($brand_id)
    {
        DB::table('brand')->where('id', $brand_id)->update(['status' => 0]);
        return redirect()->back()->with('actived', 'Bỏ kích hoạt thành công!');
    }
    public function unactive($brand_id)
    {
        DB::table('brand')->where('id', $brand_id)->update(['status' => 1]);
        return redirect()->back()->with('active', 'Kích hoạt thành công!');
    }
}
