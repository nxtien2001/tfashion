<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index()
    {
        $attributes = Attribute::latest()->paginate(10);
        if ($key = request()->key) {
            $attributes = Attribute::latest()->where('name', 'like', '%' . $key . '%')->paginate(10);
        }
        return view('admin.attribute.index', compact('attributes'));
    }
    public function create()
    {
        return view('admin.attribute.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'value' => 'required|unique:attribute'
        ], [
            'value.required' => 'Thuộc tính không được để trống',
            'value.unique' => 'Thuộc tính đã tồn tại'
        ]);
        Attribute::create($request->all());
        return redirect()->back()->with('success', 'Thêm mới thuộc tính thành công!');
    }
    public function edit($id)
    {
    }
    public function update(Request $request, $id)
    {
    }
    public function delete($id)
    {
        Attribute::find($id)->delete();
        return redirect()->back()->with('message', 'Xóa thuộc tính thành công!');
    }
}
