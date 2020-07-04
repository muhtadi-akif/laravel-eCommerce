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
                            <h3>{{$customer->name}}</h3>
                            <h4>{{$customer->email}}</h4>
                            <h4>{{$customer->phone}}</h4>
                            <a href="" class="edit_btn" data-toggle="modal" data-target="#modal-customer-logout">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 buttons_padding_top">
                <a href="#" class="genric-btn primary radius profile_buttons">Your Blogs</a>
            </div>
            <div class="col-lg-4 col-md-4 buttons_padding_top">
                <a href="#" class="genric-btn primary radius profile_buttons">Your Reviews</a>
            </div>
            <div class="col-lg-4 col-md-4 buttons_padding_top">
                <a href="#" class="genric-btn primary radius profile_buttons">Your Orders</a>
            </div>
        </div>
    </div>
</section>
@include('footer')
