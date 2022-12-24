@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <hr/>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('blog.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0">Edit Blog</h5>
                            </div>
                            <hr/>
                            <div class="row mb-3">
                                <label for="category"  class="col-sm-3 col-form-label">Category</label>
                                <div class="col-sm-9">
                                    <select name="category_id" id="category" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"{{ old('category_id', $blog->category_id) == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div  class="row mb-3">
                                <label for="author" class="col-sm-3 col-form-label">Author</label>
                                <div class="col-sm-9">
                                    <select name="author_id" id="author" class="form-control">
                                        @foreach($authors as $author)
                                            <option value="{{ $author->id }}"{{ old('author_id', $blog->author_id) == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="title" class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" id="title" value="{{$blog->title}}" class="form-control" name="title">
                                    <input type="hidden" value="{{$blog->id}}" name="blog_id">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="slug"  class="col-sm-3 col-form-label">Slug</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$blog->slug}}" class="form-control" id="slug" name="slug">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description"  class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea name="description" value="" id="description" cols="30" rows="10">{{$blog->description}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image"  class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" id="image" class="form-control">
                                    <img src="{{ asset($blog->image) }}" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="date"  class="col-sm-3 col-form-label">Date</label>
                                <div class="col-sm-9">
                                    <input type="date" value="{{$blog->date}}" name="date" id="date" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="blog_type" class="col-sm-3 col-form-label">Blog Type</label>
                                <div class="col-sm-9">
                                    <select name="blog_type"  id="blog_type" class="form-control">
                                        <option value="popular" {{ old('blog_type', $blog->blog_type) == 'popular' ? 'selected' : '' }}>Popular</option>
                                        <option value="trending" {{ old('blog_type', $blog->blog_type) == 'trending' ? 'selected' : '' }}>Trending</option>
                                        <option value="latest"{{ old('blog_type', $blog->blog_type) == 'latest' ? 'selected' : '' }} >Latest</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="status"  class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <input type="radio" id="status" name="status" value="1" {{ $blog->status == 1 ? 'checked' : ''}}> Published &nbsp;
                                    <input type="radio" id="status" name="status" value="0" {{ $blog->status == 0 ? 'checked' : ''}}> Unpublished
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
