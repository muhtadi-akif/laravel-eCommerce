@include('admin/header')
@include('admin/nav')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Customers</h1>
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
            <div class="card-header">
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>01</td>
                    <td>Zabyn</td>
                    <td>zee</td>
                    <td>+88017632763</td>
                    <td>zabyn@yahoo.com</td>
                    <td>Female</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger">Delete</button>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td>02</td>
                    <td>Momo</td>
                    <td>momo</td>
                    <td>+880987625347</td>
                    <td>momo@yahoo.com</td>
                    <td>Female</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger">Delete</button>
                        </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
</div>
@include('admin/footer')
