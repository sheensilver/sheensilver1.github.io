@extends('admin.layout.admin')

@section('title')
    posts
@endsection

@section('content')
    <div class="content-wrapper">

        @include('admin.partials.content-header',['name' => 'posts', 'key' => '' ])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="{{ route('posts.create') }}" class = "btn btn-outline-primary mb-4">Add new post</a>
                    </div>
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">That place for filter-form</h3>
          
                          <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
          
                              <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                  <i class="fas fa-search"></i>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                          <table class="table table-hover text-nowrap">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>slug</th>
                                <th>date</th>
                                <th>categories</th>
                                <th>edit</th>
                                <th>delete</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($posts as $key => $post)
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->slug }}</td>
                                <td>{{ $post->updated_at }}</td>
                                <td>
                                  @foreach($post->categories as $category)
                                    <a href="#" style = "margin-right: 15px;">{{$category->name}}</a>
                                  @endforeach
                                </td>
                                <td><a href="{{ route('posts.edit', $post) }}" class="btn btn-outline-info">Edit</a></td>
                                <td><a href="{{ route('posts.delete', $post->id) }}" class="btn btn-danger">Delete</a></td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                       
                      </div>
                      
                      {{ $posts->links() }}

                    </div>
                  </div>

            </div>
        </div>

    </div>
@endsection
