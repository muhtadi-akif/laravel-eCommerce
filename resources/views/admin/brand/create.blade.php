@include('admin/header')
@include('admin/nav')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12 content_heading_center">
              <h1>Add a brand</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <div class="card card-primary content_padding content_center_card">
        <!-- /.card-header -->
        <!-- form start -->
        <form action="/brands" method="POST">
        {{ csrf_field() }}
          <div class="card-body">
            <div class="form-group">
              <label>Brand </label>
              <input type="text" class="form-control" placeholder="Enter the brand name"
              name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label>Country </label>
                <input type="text" class="form-control" placeholder="Enter the country"
                name="ctr_name" value="{{ old('ctr_name') }}" required>
            </div>

            <div class="form-group">
                <label>Location </label>
                <input type="text" class="form-control" placeholder="Enter the location"
                name="loc_name" value="{{ old('loc_name') }}" required>
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

