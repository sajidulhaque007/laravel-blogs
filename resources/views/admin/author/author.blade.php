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
                    <form action="{{ route('author.create') }}" method="post">
                        @csrf
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0">Add Author</h5>
                        </div>
                        <hr/>
                        <div class="row mb-3">
                            <label  class="col-sm-3 col-form-label">Author Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="" name="name" placeholder="Enter Author">
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

    <div class="row">
        <div class="col-xl-9 mx-auto">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th>Sl</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                        @php $i =1 @endphp
                        @foreach($authors as $author)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{$author->name}}</td>
                            <td>
                                <a href="{{ route('author.edit',$author->id) }}" class="btn btn-sm btn-primary">edit</a>
                                <a href="{{ route('author.delete',$author->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Ary you sure to delete this..');">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
