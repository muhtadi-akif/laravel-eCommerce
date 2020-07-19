@include('header')
<div class="whole-wrap mt_130">
    <div class="container box_1170">
        <div class="section-top-border">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <h3 class="mb-30">Edit your post here</h3>
                    <form action="/posts/{{$post->id}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        {{csrf_field()}}
                        <div class="input-group-icon mt-10">
                            <div class="icon"><i class="ti-menu" aria-hidden="true"></i></div>
                            <div class="form-select" id="default-select">
                                <select name="category">
                                    @foreach($categories as $category)
                                        @if($post->category_id==$category->id)
                                            <option selected value="{{$category->id}}">{{$category->name}}</option>
                                        @else
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mt-10">
                            <input type="text" name="title" placeholder="Title"
                                   onfocus="this.placeholder = ''" onblur="this.placeholder = 'Title'" required
                                   value="{{ old('title',$post->title) }}"
                                   class="single-input">
                        </div>
                        <div class="mt-10">
							<textarea class="single-textarea" name="content" placeholder="Content"
                                      onfocus="this.placeholder = ''"
                                      onblur="this.placeholder = 'Content'" required
                            >{{ old('content',$post->content) }}
                            </textarea>
                        </div>
                        <div class="mt-10 mb-5">
                            <input type="file"
                                   class="single-input py-2" id="customFile" accept="image/*" name="post_image"
                                   required>
                            <label class="mt-10" for="customFile">{{ old('post_image',$post->image_url) }}</label>
                        </div>

                        <div class="mt-10">
                            <button type="submit" class="genric-btn primary radius">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@include('footer')
