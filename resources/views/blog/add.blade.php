@include('header')
<div class="whole-wrap mt_130">
    <div class="container box_1170">
        <div class="section-top-border">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <h3 class="mb-30">Add your post here</h3>
                    <form action="#">
                        <div class="input-group-icon mt-10">
                            <div class="icon"><i class="ti-menu" aria-hidden="true"></i></div>
                            <div class="form-select" id="default-select">
                                <select name="category">
                                    <option value="0">Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mt-10">
                            <input type="text" name="first_name" placeholder="Title"
                                   onfocus="this.placeholder = ''" onblur="this.placeholder = 'Title'" required
                                   class="single-input">
                        </div>
                        <div class="mt-10">
							<textarea class="single-textarea" placeholder="Content" onfocus="this.placeholder = ''"
                                      onblur="this.placeholder = 'Content'" required></textarea>
                        </div>
                        <div class="mt-10">
                            <input type="file"
                                   class="single-input" id="customFile" accept="image/*" name="product_image"
                                   required>
                            <label class="mt-10" for="customFile">Choose image for the post</label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@include('footer')
