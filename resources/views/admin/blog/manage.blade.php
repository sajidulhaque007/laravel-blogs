@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-xl-12 mx-auto">
            <h2>Manage Blog</h2>
            <hr>
            <div class="card">
                <div class="card-body">
                    <table id="example2" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Category Name</th>
                                <th>Title</th>
                                <th>Author Name</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Date</th>
                                <th>Blog Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @php $i =1 @endphp
                        <tbody>
                        @foreach($blogs as $blog)
                            <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{$blog->category_name}}</td>
                                    <td>{{substr($blog->title,0,10)}}</td>
                                    <td>{{$blog->name}}</td>
                                     <td>{{substr($blog->slug,0,10)}}</td>
                                    <td>{{ substr($blog->description,0,50)}}</td>
                                    <td>
                                        <img src="{{asset($blog->image)}}"  width="100" alt="">
                                    </td>
                                    <td>{{$blog->date}}</td>
                                    <td>{{$blog->blog_type}}</td>
                                    <td>{{ $blog->status == 1 ? 'published' : 'unpublished' }}</td>
                                    <td>
                                        <a href="{{ route('blog.edit',['id'=>$blog->id]) }}" class="btn btn-sm btn-primary">edit</a>
                                        @if($blog->status ==1)
                                            <a href="{{ route('status',['id'=>$blog->id]) }}" class="btn btn-sm btn-warning">Unpublish</a>
                                        @else
                                        <a href="{{ route('status',['id'=>$blog->id]) }}" class="btn btn-sm btn-success">Publish</a>
                                        @endif
                                        <a href="{{ route('blog.delete',$blog->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Ary you sure to delete this..');">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
