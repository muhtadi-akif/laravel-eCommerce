@include('admin/header')
@include('admin/nav')
@include('admin/customer/delete')
<style>
    .table > tbody > tr > td {
        vertical-align: middle;
    }
</style>
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
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td><img class="profile_picture" src="{{$customer->image_url}}" alt="" style="width:15%"/></td>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->phone}}</td>
                                <td>
                                    <button type="button" class="btn btn-danger customer-delete"
                                            data-toggle="modal" data-target="#modal-customer-delete"
                                            data-id="{{$customer->id}}" data-name="{{$customer->name}}">Delete</button>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{ $customers->links() }}
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
        $(".customer-delete").click(function () {
            var name = $(this).data('name');
            var id = $(this).data('id');
            $("#delete_name").text('Delete ' + name);
            $('#delete_form').attr('action', '/admin/customers/' + id);
        })
    });
</script>>
