<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::orderByDesc('id')->get();
        return view('pages.category.index',compact('category'));
    }
    public function create()
    {
        return view('pages.category.create');
    }
    public function store(CategoryRequest $request)
    {
        $data = $request->except(['save','_token']);
        if (isset($request->c_status)) {
            $data['c_status'] = 1;
        }else{
            $data['c_status'] =0;
        }
        $data['created_at'] = Carbon::now();
        $category = Category::insertGetId($data);
        return redirect()->route('get.category.index');
    }
    public function edit($id)
    {
        $categories = Category::findOrFail($id);

        $viewdata = [
            'categories' => $categories
        ];
        return view('pages.category.update', $viewdata);
    }
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $data = $request->except(['save','_token']);
        if (isset($request->c_status)) {
            $data['c_status'] = 1;
        }else{
            $data['c_status'] =0;
        }
        $data['updated_at'] = Carbon::now();
        $category->fill($data)->save();
        return redirect()->route('get.category.index');
    }
    public function delete( Request  $request, $id)
    {
        $category = Category::find($id);
        if ($category){
            $category->delete();
        }
            return redirect()->route('get.category.index')->with('success', 'Xoá thành công');
    }
}
