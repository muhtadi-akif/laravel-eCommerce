<?php

namespace App\Http\Controllers\Website;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {


        $products = Product::all();
        $categories = Category::where('type', Category::TYPE_PRODUCT)->latest()->take(7)->get();
        $brands = Brand::latest()->take(7)->get();
        return view('welcome', compact('products', 'categories', 'brands'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('product', compact('product'));
    }
}
