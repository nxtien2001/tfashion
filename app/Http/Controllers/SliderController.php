<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }
    public function create()
    {
        return view('admin.slider.add');
    }
    public function store(Request $request)
    {
        $slider = new Slider();
        $request->validate(
            [
                'name' => 'required|unique:slider|max:30',
                'content' => 'required|max:250',
                'image' => 'required|mimes:jpg,png,jpeg|max:5048',
            ],
            [
                'name.required' => 'Tên slider không được để trống!',
                'name.max' => 'Tên slider không được quá 30 kí tự!',
                'content.required' => 'Nội dung không được để trống!',
                'content.max' => 'Nội dung không được quá 250 kí tự!',
                'image.required' => 'Ảnh không được để trống'
            ]
        );
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('upload/product'), $filename);
            $slider->image = $filename;
        }
        Slider::insert([
            'name' => $request->name,
            'content' => $request->content,
            'image' => $filename
        ]);
        return redirect()->back()->with('success', 'Thêm slider thành công!');
    }
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }
    public function update(Request $request, $id)
    {
        $slider = new Slider();
        $request->validate(
            [
                'name' => 'required|max:30',
                'content' => 'required|max:250',
                'image' => 'required|mimes:jpg,png,jpeg|max:5048',
            ],
            [
                'name.required' => 'Tên slider không được để trống!',
                'name.max' => 'Tên slider không được quá 30 kí tự!',
                'content.required' => 'Nội dung không được để trống!',
                'content.max' => 'Nội dung không được quá 250 kí tự!',
                'image.required' => 'Ảnh không được để trống'
            ]
        );
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('upload/product'), $filename);
            $slider->image = $filename;
        }
        Slider::find($id)->update([
            'name' => $request->name,
            'content' => $request->content,
            'image' => $filename
        ]);
        return redirect()->back()->with('success', 'Cập nhật slider thành công!');
    }
    public function delete($id)
    {
        Slider::find($id)->delete();
        return redirect()->back()->with('message', 'Xóa dữ liệu thành công!');
    }
}
