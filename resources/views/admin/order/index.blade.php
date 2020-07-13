@include('admin/header')
@include('admin/nav')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products</h1>
                </div>
                <div class="col-sm-2">
                </div>
                <div class="col-sm-2">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content_padding">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-head-fixed text-nowrap table_data_center">
                        <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Delivery Address</th>
                            <th>Total Price</th>
                            <th>Ordered At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orderDetails as $orderDetail)
                            <tr>
                                <td>{{$orderDetail->customer->user->first_name}} {{$orderDetail->customer->user->last_name}}</td>
                                <td>{{$orderDetail->delivery_address}}</td>
                                <td>¥{{$orderDetail->total_price}}</td>
                                <td>{{$orderDetail->created_at}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="/admin/orders/{{$orderDetail->id}}"
                                           class="btn btn-success">Details</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{ $orderDetails->links() }}
                    </ul>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->
</div>


@include('admin/footer')
<script type="text/javascript">
    $(function () {
        $(".product-delete").click(function () {
            var title = $(this).data('title');
            var id = $(this).data('id');
            $("#delete_name").text('Delete ' + title);
            $('#delete_form').attr('action', '/admin/products/' + id);
        })
    });
</script>>
