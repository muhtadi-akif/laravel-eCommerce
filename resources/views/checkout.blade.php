@include('header')
<!--================Checkout Area =================-->
<section class="checkout_area padding_top">
    <div class="container">
        @if($user = Cartalyst\Sentinel\Laravel\Facades\Sentinel::check())
            @if($user->hasAccess([App\User::ADMIN_PERMISSION]))
                <div class="cupon_area">
                    <div class="check_title">
                        <h2>
                            You need to login to complete your order.
                            <t/>
                            <a href="/customers">Click here to login</a>
                        </h2>
                    </div>
                </div>
            @endif
        @else
            <div class="cupon_area">
                <div class="check_title">
                    <h2>
                        You need to login to complete your checkout.
                        <t/>
                        <a href="/customers">Click here to login</a>
                    </h2>
                </div>
            </div>
        @endif
        <form action="/carts" method="post">
            {{csrf_field()}}
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 style="margin-left: 3%">Billing Details</h3>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="add1" name="address" required/>
                            <span class="placeholder" data-placeholder="Shipping Address"></span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li>
                                    <a href="#">Product
                                        <span>Total</span>
                                    </a>
                                </li>
                                @foreach($items as $item)
                                    <li>
                                        <a href="/products/{{$item['product']->id}}">{{$item['product']->title}}
                                            <span class="middle">x {{$item['quantity']}}</span>
                                            <span class="last">¥{{$item['quantity']*$item['product']->price}}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <ul class="list list_2">
                                <li>
                                    <a href="#">Total
                                        <span>¥{{$total}}</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="creat_account">
                            </div>
                            @if($user = Cartalyst\Sentinel\Laravel\Facades\Sentinel::check())
                                @if(!$user->hasAccess([App\User::ADMIN_PERMISSION]))
                                    <button type="submit" class="btn_3" style="width: 100%">Confirm Order</button>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!--================End Checkout Area =================-->
@include('footer')
