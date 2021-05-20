@extends('admin.layout.admin')

@section('title')
    Add new Category
@endsection

@section('content')
<div class="content-wrapper">

@include('admin.partials.content-header', ['name' => 'category', 'key' => 'Add'])

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <form action ="{{route('categories.store')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="categoryName">Category name</label>
              <input type="text" class="form-control" id="categoryName" name ="name" placeholder="Enter category name">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="form-group">
              <label for="parentId">Parent Category</label>
              <select class="form-control" id="parentId" name = "parent_id">
                <option value="0">Select Parent Category</option>
                {{-- {{!! $htmlOptions !!}} --}}
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
