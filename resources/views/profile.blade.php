@include('header')
@include('logout')
<style>
    .buttons_padding_top {
        padding-top: 40px;
    }

    .profile_buttons {
        width: 100%;
    }
</style>
<section class="login_part padding_top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12">
                <div class="review_item">
                    <div class="media">
                        <div class="d-flex">
                            <img class="profile_picture" src="{{$customer->image_url}}" alt=""/>
                        </div>
                        <div class="media-body">
                            <h3>{{$customer->user->first_name}} {{$customer->user->last_name}}</h3>
                            <h4>{{$customer->user->email}}</h4>
                            <h4>{{$customer->phone}}</h4>
                            <a href="" class="edit_btn" data-toggle="modal"
                               data-target="#modal-customer-logout">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <section class="product_description_area">
                <div class="container">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#orders" role="tab"
                               aria-controls="orders"
                               aria-selected="true">Your Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#posts" role="tab"
                               aria-controls="posts"
                               aria-selected="false">Your Posts</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                            <p>Orders</p>
                        </div>
                        <div class="tab-pane fade show" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                            @foreach($customer->posts as $post)
                                <div class="col-lg-8 mb-5 mb-lg-0">
                                    <article class="blog_item">
                                        <div class="blog_item_img">
                                            <img class="card-img rounded-0" src="{{$post->image_url}}" alt="">
                                            <a href="#" class="blog_item_date">
                                                <h3>{{\Carbon\Carbon::parse($post->created_at)->format('d')}}</h3>
                                                <p>{{\Carbon\Carbon::parse($post->created_at)->format('M')}}</p>
                                            </a>
                                        </div>
                                        <div class="blog_details">
                                            <h2>{{$post->title}}</h2>
                                            <p>{{$post->content}}</p>
                                            <ul class="blog-info-link">
                                                <li><a href="#"><i class="ti-pencil"></i>Edit</a></li>
                                                <li><a href="#"><i class="ti-trash"></i>Delete</a></li>
                                            </ul>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

@include('footer')
