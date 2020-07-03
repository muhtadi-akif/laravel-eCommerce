@include('admin/header')
@include('admin/nav')
@include('admin/product/delete')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$product->category->name}}</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <div class="col-10">
                <img src="{{asset($product->image_url)}}" class="product-image" alt="Product Image">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">{{$product->title}}</h3>
              <p>{{$product->short_description}}</p>

              <hr>
              <h4>{{$product->brand->name}}</h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                  <span class="text-xl"><small>{{$product->property->width}}cm</small></span>
                  <br>
                  Width
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                  <span class="text-xl"><small>{{$product->property->height}}cm</small></span>
                  <br>
                  Height
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                  <span class="text-xl"><small>{{$product->property->weight}}cm</small></span>
                  <br>
                  Weight
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                  <span class="text-xl"><small>{{$product->property->depth}}cm</small></span>
                  <br>
                  Depth
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                  @if ($product->property->quality_checking)
                    <span class="text-xl"><i class="nav-icon fas fa-check-circle"></i></span>
                  @else
                    <span class="text-xl"><i class="nav-icon fas fa-times-circle"></i></span>
                  @endif
                  <br>
                  Quality-Checked
                </label>
              </div>

              <div class="bg-gray-dark py-2 px-3 mt-4 col-6">
                <h2 class="mb-0">
                    ¥{{$product->price}}
                </h2>
              </div>

              <div class="mt-4">
                <div class="btn-group">
                    <a href="/admin/products/{{$product->id}}/edit" class="btn btn-info">Edit</a>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-danger product-delete"
                    data-toggle="modal" data-target="#modal-product-delete"
                    data-id="{{$product->id}}" data-title="{{$product->title}}">Delete</button>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">{{$product->description}} </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

@include('admin/footer')
<script type="text/javascript">
    $(function () {
        $(".product-delete").click(function () {
            var title = $(this).data('title');
            var id = $(this).data('id');
            $("#delete_name").text('Delete '+title);
            $('#delete_form').attr('action', '/admin/products/'+id);
        })
    });
</script>>
