<?php

namespace App\Http\Controllers\Website;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        $categories = Category::where('type', Category::TYPE_POST)->latest()->take(6)->get();
        return view('blog/index', compact('categories', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('type', Category::TYPE_POST)->get();
        return view('blog/add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Sentinel::check();
        if (!$user) {
            return Redirect::back()->withErrors("Log in to continue")->withInput($request->input());
        }
        request()->validate([
            'post_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $title = $request->input('title');
        $content = $request->input('content');
        $slug = str_slug($title, '-');
        $category_id = $request->input('category');
        if (!$category_id) {
            return Redirect::back()->withErrors("You have to choose a category")->withInput($request->input());
        }
        $post_image = $request->file('post_image');
        $imageName = $slug . '-' . time() . '.' . $post_image->getClientOriginalExtension();
        $image_url = $this->getImageUploadRoute() . $imageName;

        $post = new Post();
        $post->title = $title;
        $post->slug = $slug;
        $post->content = $content;
        $post->image_url = $image_url;
        $post->category_id = $category_id;
        $post->customer_id = $user->customer->id;
        $post->save();

        $post_image->move(public_path($this->getImageUploadRoute()), $imageName);
        return Redirect::to('/posts');
    }

    private function getImageUploadRoute()
    {
        return '/images/posts/';
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $customer_id = $post->customer->id;
        $post->delete();
        return Redirect::to('/customers/' . $customer_id);
    }
}
