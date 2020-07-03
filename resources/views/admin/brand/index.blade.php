@include('admin/header')
@include('admin/nav')
@include('admin/brand/delete')
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
                <a href="/brands/create" class="btn btn-block btn-outline-success btn-lg">Add a brand</a>
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
                    <th>Country</th>
                    <th>Location</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand)
                        <tr>
                            <td>{{$brand->name}}</td>
                            <td>{{$brand->country}}</td>
                            <td>{{$brand->location}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="/brands/{{$brand->id}}/edit" class="btn btn-info">Edit</a>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger brand-delete"
                                    data-toggle="modal" data-target="#modal-brand-delete"
                                    data-id="{{$brand->id}}" data-name="{{$brand->name}}" data-country="{{$brand->country}}">Delete</button>
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
                    {{ $brands->links() }}
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
        $(".brand-delete").click(function () {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var country = $(this).data('country');
            $("#delete_name").text('Delete '+name+', '+country);
            $('#delete_form').attr('action', 'brands/'+id);
        })
    });
</script>>

