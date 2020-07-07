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
        //register through sentinel
//        $check = Sentinel::register([
//            'email' => 'akif@co-well.jp',
//            'password' => 'Hello1234',
//        ]);

        //activation through sentinel
//        $user = Sentinel::findById(1);
//        $activation = Activation::create($user);
//        $activation = Activation::complete($user, '64u3G4Y45JBmwpKDngirfz3IIAH3a95X');

        //login through sentinel
        $credentials = [
            'email' => 'akif@co-well.jp',
            'password' => 'Hello1234',
        ];

        $check = Sentinel::authenticate($credentials);

        return response()->json($check);

//        $products = Product::all();
//        $categories = Category::latest()->take(7)->get();
//        $brands = Brand::latest()->take(7)->get();
//        return view('welcome', compact('products', 'categories', 'brands'));
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
