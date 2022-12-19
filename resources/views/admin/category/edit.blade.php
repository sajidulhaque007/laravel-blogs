@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <a href="{{ route('category') }}" class="btn btn-primary">Back</a>

            <hr/>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('category.update') }}" method="post">
                        @csrf
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0">Update Category</h5>
                        </div>
                        <hr/>
                        <div class="row mb-3">
                            <label  class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <input type="hidden" value="{{ $category->id }}" name="category_id">
                                <input type="text" class="form-control" value="{{$category->category_name}}" id="" name="category_name" placeholder="Enter Category">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-sm-3 col-form-label">Category Status</label>
                            <div class="col-sm-9">
                                <input type=radio name="status" value="1" {{ $category->status == 1 ? 'checked' : ''}}> Published
                                <input type=radio name="status" value="0" {{ $category->status == 0 ? 'checked' : ''}}> Unpublished
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary px-5">Submit</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
