@include('admin/header')
@include('admin/nav')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12 content_heading_center">
              <h1>Add an Admin</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <div class="card card-primary content_padding content_center_card">
        <!-- /.card-header -->
        <!-- form start -->
        <form action="/admin" method="POST">
        {{ csrf_field() }}
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Enter username" name="username" value="{{ old('username') }}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" value="{{ old('password') }}">
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary content_center_card">ADD</button>
          </div>
        </form>
      </div>
</div>

@include('admin/footer')

