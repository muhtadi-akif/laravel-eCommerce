@include('header')
<!--================Blog Area =================-->
<section class="blog_area padding_top mb-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" src="img/blog/single_blog_1.png" alt="">
                            <a href="#" class="blog_item_date">
                                <h3>15</h3>
                                <p>Jan</p>
                            </a>
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="single-blog.html">
                                <h2>Google inks pact for new 35-storey office</h2>
                            </a>
                            <p>That dominion stars lights dominion divide years for fourth have don't stars is that
                                he earth it first without heaven in place seed it second morning saying.</p>
                            <ul class="blog-info-link">
                                <li><a href="#"><i class="ti-user"></i> Travel, Lifestyle</a></li>
                            </ul>
                        </div>
                    </article>

                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Previous">
                                    <i class="ti-angle-left"></i>
                                </a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">1</a>
                            </li>
                            <li class="page-item active">
                                <a href="#" class="page-link">2</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Next">
                                    <i class="ti-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    @if($user = Cartalyst\Sentinel\Laravel\Facades\Sentinel::check())
                        @if(!$user->hasAccess([App\User::ADMIN_PERMISSION]))
                            <aside class="single_sidebar_widget search_widget">
                                <a href="/posts/create">
                                    <button class="button rounded-0 primary-bg text-white w-100 btn_1"
                                            type="button">Add a post
                                    </button>
                                </a>
                            </aside>
                        @endif
                    @endif
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Category</h4>
                        <ul class="list cat-list">
                            @foreach($categories as $category)
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>{{$category->name}}</p>
                                        <p>({{$category->posts->count()}})</p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->
@include('footer')
