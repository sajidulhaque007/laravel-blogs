@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <a href="{{ route('author') }}" class="btn btn-primary">Back</a>
            <hr/>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('author.update') }}" method="post">
                        @csrf
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0">Update Author</h5>
                        </div>
                        <hr/>
                        <div class="row mb-3">
                            <label  class="col-sm-3 col-form-label">Author Name</label>
                            <div class="col-sm-9">
                                <input type="hidden" value="{{ $author->id }}" name="id">
                                <input type="text" class="form-control" value="{{$author->name}}" id="" name="name" placeholder="Enter Author">
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
