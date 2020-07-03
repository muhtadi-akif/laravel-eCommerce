<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $products = Product::paginate(5);
        return view('admin/product/index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('type', Category::TYPE_PRODUCT)->get();
        $brands = Brand::all();
        return view('admin/product/create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([
            'product_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $title = $request->input('title');
        $cat_id =  $request->input('cat_id');
        $brand_id =  $request->input('brand_id');
        $price =  $request->input('price');
        $qty =  $request->input('qty');
        $width =  $request->input('width');
        $height =  $request->input('height');
        $depth =  $request->input('depth');
        $weight =  $request->input('weight');
        $s_desc =  $request->input('s_desc');
        $desc =  $request->input('desc');
        $qc = $request->input('qc') == 'on' ? true : false;
        $slug = str_slug($title, '-');
        $product_image = $request->file('product_image');
        $imageName = $slug . '-' . time() . '.' . $product_image->getClientOriginalExtension();
        $image_url = $this->getImageUploadRoute() . $imageName;

        $product = new Product();
        $product->title = $title;
        $product->slug = $slug;
        $product->category_id = $cat_id;
        $product->brand_id = $brand_id;
        $product->price = $price;
        $product->quantity = $qty;
        $product->short_description = $s_desc;
        $product->description = $desc;
        $product->image_url = $image_url;
        $product->save();

        $property = new Property();
        $property->width = $width;
        $property->height = $height;
        $property->depth = $depth;
        $property->weight = $weight;
        $property->quality_checking = $qc;
        $property->product_id = $product->id;
        $property->save();

        $product_image->move(public_path($this->getImageUploadRoute()), $imageName);
        return Redirect::to('admin/products');
    }

    private function getImageUploadRoute()
    {
        return '/images/products/';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
       return view('admin/product/show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::where('type', Category::TYPE_PRODUCT)->get();
        $brands = Brand::all();
        return view('admin/product/edit', compact('categories', 'brands', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product_image = $request->file('product_image');
        $title = $request->input('title');
        $slug = str_slug($title, '-');
        $cat_id =  $request->input('cat_id');
        $brand_id =  $request->input('brand_id');
        $price =  $request->input('price');
        $qty =  $request->input('qty');
        $width =  $request->input('width');
        $height =  $request->input('height');
        $depth =  $request->input('depth');
        $weight =  $request->input('weight');
        $s_desc =  $request->input('s_desc');
        $desc =  $request->input('desc');
        $qc = $request->input('qc') == 'on' ? true : false;

        $product = Product::find($id);
        $product->title = $title;
        $product->slug = $slug;
        $product->category_id = $cat_id;
        $product->brand_id = $brand_id;
        $product->price = $price;
        $product->quantity = $qty;
        $product->short_description = $s_desc;
        $product->description = $desc;
        if($product_image){
            request()->validate([
                'product_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            $imageName = $slug . '-' . time() . '.' . $product_image->getClientOriginalExtension();
            $image_url = $this->getImageUploadRoute() . $imageName;
            $product->image_url = $image_url;
        }
        $product->save();

        $property = $product->property;
        $property->width = $width;
        $property->height = $height;
        $property->depth = $depth;
        $property->weight = $weight;
        $property->quality_checking = $qc;
        $property->product_id = $product->id;
        $property->save();
        if($product_image){
            $product_image->move(public_path($this->getImageUploadRoute()), $imageName);
        }
        return Redirect::to('admin/products/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return Redirect::to('admin/products');
    }
}
