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
            <div class="col-sm-2">
                <a href="/admin/products/create" class="btn btn-block btn-outline-success btn-lg">Add a product</a>
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
                    <th>Title</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Brand</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->title}}</td>
                            <td>{{$product->price}} ¥</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->brand->name}}, {{$product->brand->country}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="/admin/products/{{$product->id}}" class="btn btn-success">Show</a>
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
                    {{ $products->links() }}
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
            $("#delete_name").text('Delete '+title);
            $('#delete_form').attr('action', '/admin/products/'+id);
        })
    });
</script>>
