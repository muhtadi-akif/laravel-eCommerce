@include('admin/header')
@include('admin/nav')
@include('admin/delete')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Admins</h1>
            </div>
            <div class="col-sm-2">
            </div>
            <div class="col-sm-2">
            </div>
            <div class="col-sm-2">
                <a href="/admin/create" class="btn btn-block btn-outline-success btn-lg">Add a new Admin</a>
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
                    <th>Username</th>
                    <th>Password</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                        <tr>
                            <td>{{$admin->username}}</td>
                            <td>{{$admin->password}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="/admin/{{$admin->id}}/edit" class="btn btn-info">Edit</a>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger admin-delete"
                                    data-toggle="modal" data-target="#modal-admin-delete"
                                    data-id="{{$admin->id}}" data-username="{{$admin->username}}">Delete</button>
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
                    {{ $admins->links() }}
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
        $(".admin-delete").click(function () {
            var username = $(this).data('username');
            var id = $(this).data('id');
            $("#delete_username").text(username);
            $('#delete_form').attr('action', 'admin/'+id);
        })
    });
</script>>
