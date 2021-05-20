@extends('admin.layout.admin')

@section('title')
    Users
@endsection

@section('content')
    <div class="content-wrapper">

        @include('admin.partials.content-header',['name' => 'Categories', 'key' => '' ])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="{{ route('users.create') }}" class = "btn btn-outline-primary mb-4">Add new User</a>
                    </div>
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Users</h3>
          
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
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Posts</th>
                                <th>Edit</th>
                                <th>Delete</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($users as $key => $user)
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td> 0</td>
                                <td><a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-outline-info">Edit</a></td>
                                <td><a href="{{ route('users.delete', ['id' => $user->id]) }}" class="btn btn-danger">Delete</a></td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                       
                      </div>
                      
                      {{ $users->links() }}

                    </div>
                  </div>

            </div>
        </div>

    </div>
@endsection
