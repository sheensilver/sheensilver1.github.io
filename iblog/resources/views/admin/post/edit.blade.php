@extends('admin.layout.admin')

@section('title')
    Add new post
@endsection

@section('content')
<div class="content-wrapper">

@include('admin.partials.content-header', ['name' => 'post', 'key' => 'Add'])

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <form action ="{{route('posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="postTitle">Post Title</label>
              <input type="text" class="form-control" id="postTitle" name ="title" placeholder="Enter post title" value = "{{ $post->title }}">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="form-group">
              <label for="postContent">Content</label>
              <textarea name="content" id="postContent" >{{  $post->content }}</textarea>
              <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
              <script>
                  // tinymce.baseURL = "js/tinymce";
                  tinymce.init({
                      selector: "textarea#postContent",
                      height: 600,
                      toolbar: "insertfile undo redo | styleselect | bold italic |alignleft aligncenter alignright alignjustify | bullist numlist outdent indent"
                  });
              </script>
            </div>
            <div class="form-group">
              <h2>Chooise Category</h2>
              <div class = "flex">
                @foreach( $categories as $category )
                <div class="form-group">
                  <input type="checkbox" name="categories[]" value="{{ $category->id }}" 
                  @foreach($post->categories as $post_category)
                    @if($post_category->id == $category->id)
                      checked
                      @break
                    @endif
                  @endforeach
                   />{{$category->name}}
                </div>
                @endforeach
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
