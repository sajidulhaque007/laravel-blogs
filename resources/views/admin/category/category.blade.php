@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <hr/>
            <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <form id="catForm" action="{{ route('category.create') }}" method="post">
                        @csrf
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0">Add Category</h5>
                        </div>
                        <hr/>
                        <div class="row mb-3">
                            <label  class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="category" name="category_name" placeholder="Enter Category">
                                <span id="errorMessage" class="text-danger"></span>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" id="catBtn" class="btn btn-primary px-5">Submit</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-9 mx-auto">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th>Sl</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @php $i =1 @endphp
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{$category->category_name}}</td>
                            <td>{{ $category->status == 1 ? 'published' : 'unpublished' }}</td>
                            <td>
                                <a href="{{ route('category.edit',$category->id) }}" class="btn btn-sm btn-primary">edit</a>
                                <a href="{{ route('category.delete',$category->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Ary you sure to delete this..');">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
