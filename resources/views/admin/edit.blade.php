@include('admin/header')
@include('admin/nav')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 content_heading_center">
                    <h1>Edit Admin</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="card card-primary content_padding content_center_card">
        <!-- /.card-header -->
        <!-- form start -->
        <form action="/admin/{{$admin->id}}" method="POST">
            @method('PUT')
            {{ csrf_field() }}
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="First Name" name="first_name"
                           value="{{ old('first_name', $admin->first_name) }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Last Name" name="last_name"
                           value="{{ old('last_name', $admin->last_name) }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Email" name="email"
                           value="{{ old('email', $admin->email) }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                           name="password" value="{{ old('password', $admin->password) }}">
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary content_center_card">UPDATE</button>
            </div>
        </form>
    </div>
</div>
@include('admin/footer')
