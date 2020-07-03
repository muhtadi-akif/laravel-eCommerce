@include('admin/header')
@include('admin/nav')
@include('admin/category/delete')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Categories</h1>
            </div>
            <div class="col-sm-2">
            </div>
            <div class="col-sm-2">
            </div>
            <div class="col-sm-2">
                <a href="/categories/create" class="btn btn-block btn-outline-success btn-lg">Add a category</a>
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
                    <th>Name</th>
                    <th>Type</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>{{$category->type}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="/categories/{{$category->id}}/edit" class="btn btn-info">Edit</a>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger category-delete"
                                    data-toggle="modal" data-target="#modal-category-delete"
                                    data-id="{{$category->id}}" data-name="{{$category->name}}">Delete</button>
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
                    {{ $categories->links() }}
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
        $(".category-delete").click(function () {
            var name = $(this).data('name');
            var id = $(this).data('id');
            $("#delete_name").text('Delete '+name);
            $('#delete_form').attr('action', 'categories/'+id);
        })
    });
</script>>
