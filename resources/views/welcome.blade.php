@include('header')
<style>
    .page-item.active .page-link {
        background-color: #ff3368;
    }
</style>
<!--================Category Product Area =================-->
<section class="cat_product_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="left_sidebar_area">
                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Browse Categories</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="#">{{$category->name}}</a>
                                        <span>{{$category->products->count()}}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>

                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Browse Brands</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                @foreach ($brands as $brand)
                                    <li>
                                        <a href="#">{{$brand->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product_top_bar d-flex justify-content-between align-items-center">
                            <div class="single_product_menu">
                                @if ($products->count()>1)
                                    <p><span>{{$products->count()}} </span> Products Found</p>
                                @else
                                    <p><span>{{$products->count()}} </span> Product Found</p>
                                @endif
                            </div>
                            <div class="single_product_menu d-flex">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="search"
                                           aria-describedby="inputGroupPrepend">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend"><i
                                                class="ti-search"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center latest_product_inner">
                    @foreach ($products as $product)
                        <div class="col-lg-4 col-sm-6">
                            <div class="single_product_item">
                                <img src="{{asset($product->image_url)}}" alt="">
                                <div class="single_product_text">
                                    <h4>{{$product->title}}</h4>
                                    <h3>¥{{$product->price}}</h3>
                                    <a href="/products/{{$product->id}}" class="add_cart">View the product</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-lg-12">
                        <div class="pageination">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item">{{$products->links()}}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Category Product Area =================-->
@include('footer')
