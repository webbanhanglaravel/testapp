<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index(){
        $product = Product::orderByDesc('id')->get();
        return view('pages.product.index',compact('product',$product));
    }
    public function create()
    {
        $categories = Category::get();
        return view('pages.product.create',compact('categories'));
    }
    public function store(ProductRequest $request)
    {
        $file = $request->file('image');
        $data = $request->except(['save','_token']);
        if (!$request->price) $data['price'] = 0;
        if (!$request->amount) $data['amount'] = 0;
        if (isset($request->p_status)) {
            $data['p_status'] = 1;
        }else{
            $data['p_status'] =0;
        }
        $data['created_at'] = Carbon::now();
        if($file) {
            $data['image'] = $file->getClientOriginalName();
            $file->storeAs('', $file->getClientOriginalName(), 'image');
        }
        $productId = Product::insertGetId($data);
        if($productId){
            return redirect()->route('get.product.index')->with('success', 'Thêm mới thành công');
        }

    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::get();
        $viewdata = [
            'product' => $product,
             'categories' => $categories
        ];
        return view('pages.product.update', $viewdata);
    }
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $file = $request->file('image');
        $data = $request->except(['save','_token']);
        if (!$request->price) $data['price'] = 0;
        if (!$request->amount) $data['amount'] = 0;
        if (isset($request->p_status)) {
            $data['p_status'] = 1;
        }else{
            $data['p_status'] =0;
        }
        if($file) {
            $data['image'] = $file->getClientOriginalName();
            $file->storeAs('', $file->getClientOriginalName(), 'image');
        }
        $data['updated_at'] = Carbon::now();
        $product->fill($data)->save();
        return redirect()->route('get.product.index')->with('success', 'Sửa thành công');
    }
    public function delete( Request  $request, $id)
    {
            $product = Product::find($id);
            if ($product){
                $product->delete();
            }
        return redirect()->route('get.product.index')->with('success', 'Thao tác thành công');
    }
}
