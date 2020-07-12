@include('header')
<style>
    #upper_tr {
        text-align: center;
    }
</style>
<!--================Cart Area =================-->
<section class="cart_area padding_top">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr id="upper_tr">
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr id="upper_tr">
                            <td>
                                <img src="{{$item['product']->image_url}}" alt="{{$item['product']->slug}}"
                                     style="max-width: 50px"/>
                            </td>
                            <td>
                                <p>{{$item['product']->title}}</p>
                            </td>
                            <td>
                                <h5>¥{{$item['product']->price}}</h5>
                            </td>
                            <td>
                                <h5>{{$item['quantity']}}</h5>
                            </td>
                            <td>
                                <h5>¥{{$item['product']->price*$item['quantity']}}</h5>
                            </td>
                        </tr>
                    @endforeach

                    <tr class="bottom_button">
                        <td>
                            <a class="btn_1" href="/">Continue Shopping</a>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="cupon_text float-right">
                                <a class="btn_1" href="/carts/create">Clear Cart</a>
                            </div>
                        </td>
                    </tr>
                    <tr class="shipping_area">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                        <td>
                            <div class="shipping_box">
                                <a class="btn_1" href="/carts/checkout">Proceed to Checkout</a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
</section>
<!--================End Cart Area =================-->
@include('footer')
