<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
           $categories = Category::get();
           $products = Product::with('category')->where('p_status',1)->get();
           $viewdata = [
               "categories" => $categories,
                'products' => $products
           ];
           return view('pages.home.index',$viewdata);
    }
}
