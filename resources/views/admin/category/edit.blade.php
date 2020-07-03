@include('admin/header')
@include('admin/nav')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12 content_heading_center">
              <h1>Edit Category</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <div class="card card-primary content_padding content_center_card">
        <!-- /.card-header -->
        <!-- form start -->
        <form action="/categories/{{$category->id}}" method="POST">
         @method('PUT')
        {{ csrf_field() }}
        <div class="card-body">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" placeholder="Enter name of the cateogry"
              name="name" value="{{ old('name', $category->name)}}">
            </div>
            <div class="form-group">
                <label>Type</label>
                <select class="form-control" name="type">
                    @foreach ($types as $type)
                        @if($type == $category->type)
                            <option selected>{{$type}}</option>
                        @else
                            <option>{{$type}}</option>
                        @endif

                    @endforeach
                </select>
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
