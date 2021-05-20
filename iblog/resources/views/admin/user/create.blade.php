@extends('admin.layout.admin')

@section('title')
    Add new Category
@endsection

@section('content')
<div class="content-wrapper">

  @include('admin.partials.content-header', ['name' => 'User', 'key' => 'Add'])

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <form action ="{{route('users.store')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="categoryName">Name</label>
              <input type="text" class="form-control" id="categoryName" name ="name" placeholder="Enter category name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="categoryName">Userame</label>
              <input type="text" class="form-control" id="categoryName" name ="username" placeholder="Enter category name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="useremail">Email</label>
              <input type="text" class="form-control" id="useremail" name ="email" placeholder="Enter category name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name ="password" >
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="role">Chooise User Role</label>
              <select class="form-control" id="role" name = "role">
                <option value="user">User</option>
                <option value="writer">Writer</option>
                <option value="manager">Manager</option>
                <option value="admin">Admin</option>
                
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
