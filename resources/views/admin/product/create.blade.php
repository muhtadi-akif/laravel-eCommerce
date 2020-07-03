@include('admin/header')
@include('admin/nav')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12 content_heading_center">
              <h1>Add a Product</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <div class="card card-primary content_padding content_center_product_card">
        <!-- /.card-header -->
        <!-- form start -->
        <form action="/admin/products" method="POST"  enctype="multipart/form-data">
        {{ csrf_field() }}
          <div class="card-body">
            <div class="form-group">
              <label>Title</label>
              <input type="text" class="form-control" placeholder="Enter the title of the product"
              name="title" value="{{ old('title') }}" required>
            </div>
            <div class="row form-group">
                <div class="col-sm-6">
                    <label>Category</label>
                    <select class="form-control" name="cat_id" value="{{ old('cat_id') }}">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6">
                    <label>Brand</label>
                    <select class="form-control" name="brand_id" value="{{ old('brand_id') }}">
                        @foreach ($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}, {{$brand->country}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sm-6">
                    <label>Price</label>
                    <input type="number" class="form-control" placeholder="Enter price of the product per unit"
                    name="price" value="{{ old('price') }}" required>
                </div>
                <div class="col-sm-6">
                    <label>Quantity</label>
                    <input type="number" class="form-control" placeholder="Enter the quantity available"
                    name="qty" value="{{ old('qty') }}" required>
                </div>
            </div>
            <label>Properties</label>
            <div class="row form-group">
                <div class="col-sm-3">
                    <input type="number" class="form-control" placeholder="Width"
                    name="width" value="{{ old('width') }}" required>
                </div>
                <div class="col-sm-3">
                    <input type="number" class="form-control" placeholder="Height"
                    name="height" value="{{ old('height') }}" required>
                </div>
                <div class="col-sm-3">
                    <input type="number" class="form-control" placeholder="Depth"
                    name="depth" value="{{ old('depth') }}" required>
                </div>
                <div class="col-sm-3">
                    <input type="number" class="form-control" placeholder="Weight"
                    name="weight" value="{{ old('weight') }}" required>
                </div>
            </div>
            <div class="form-group">
                <label>Short Description</label>
                <textarea class="form-control" rows="2"
                placeholder="Write a short description about your product" name="s_desc" value="{{ old('s_desc') }}" required></textarea>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" rows="4"
                placeholder="Write a description about your product" name="desc" value="{{ old('desc') }}" required></textarea>
            </div>
            <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile" accept="image/*" name="product_image" required>
                  <label class="custom-file-label" for="customFile">Choose product image</label>
                </div>
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="qc">
                  <label for="customCheckbox1" class="custom-control-label"> Quality Checked</label>
                </div>
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
