@include('header')
<style>
    #upper_tr{
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
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr id="upper_tr">
                        <td>
                            <div class="media">
                                <div class="d-flex">
                                    <img src="img/product/single-product/cart-1.jpg" alt=""/>
                                </div>
                                <div class="media-body">
                                    <p>Minimalistic shop for multipurpose use</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <h5>$360.00</h5>
                        </td>
                        <td>
                            <h5>10</h5>
                        </td>
                        <td>
                            <h5>$720.00</h5>
                        </td>
                    </tr>


                    <tr class="bottom_button">
                        <td>
                            <a class="btn_1" href="/">Continue Shopping</a>
                        </td>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="cupon_text float-right">
                                <a class="btn_1" href="#">Clear Cart</a>
                            </div>
                        </td>
                    </tr>
                    <tr class="shipping_area">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                        <td>
                            <div class="shipping_box">
                                <a class="btn_1" href="#">Proceed to Checkout</a>
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
