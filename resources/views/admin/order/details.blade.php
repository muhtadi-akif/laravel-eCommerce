@include('admin/header')
@include('admin/nav')
<div class="content-wrapper">
    <section class="content" style="margin-top: 8px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-shopping-cart"></i> Aranoz
                                    @php($createdAt = \Illuminate\Support\Carbon::parse($orderDetail->created_at)->format('M d Y'))
                                    <small class="float-right">Order Date: {{$createdAt}}</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Order No:</b> {{$orderDetail->id}}<br>
                                <address>
                                    <strong>{{$orderDetail->customer->user->first_name}} {{$orderDetail->customer->user->last_name}}</strong><br>
                                    {{$orderDetail->delivery_address}}<br>
                                    Phone: {{$orderDetail->customer->phone}}<br>
                                    Email: {{$orderDetail->customer->user->email}}
                                </address>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Qty</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Subtotal</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orderDetail->orders as $order)
                                        <tr>
                                            <td>{{$order->quantity}}</td>
                                            <td>{{$order->product->title}}</td>
                                            <td>¥{{$order->price}}</td>
                                            <td>{{$order->product->short_description}}</td>
                                            <td>¥{{$order->quantity * $order->price}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">

                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <p class="lead">Amount Due</p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th>Total:</th>
                                            <td>¥{{$orderDetail->total_price}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <!-- /.row -->
                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <button type="button" class="btn btn-success float-right"><i
                                        class="far fa-check-square"></i> Confirm Order
                                </button>
                                <button type="button" class="btn btn-danger float-right" style="margin-right: 5px;">
                                    <i class="fas fa-window-close"></i> Cancel Order
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section>
</div>
@include('admin/footer')
