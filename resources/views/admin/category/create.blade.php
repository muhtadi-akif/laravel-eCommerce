@include('admin/header')
@include('admin/nav')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12 content_heading_center">
              <h1>Add an category</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <div class="card card-primary content_padding content_center_card">
        <!-- /.card-header -->
        <!-- form start -->
        <form action="/categories" method="POST">
        {{ csrf_field() }}
          <div class="card-body">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" placeholder="Enter name of the cateogry"
              name="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label>Type</label>
                <select class="form-control" name="type" value="{{ old('type') }}">
                    @foreach ($types as $type)
                        <option>{{$type}}</option>
                    @endforeach
                </select>
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

