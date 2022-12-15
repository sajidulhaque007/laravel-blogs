@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <hr/>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('blog.create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0">Add Blog</h5>
                            </div>
                            <hr/>
                            <div class="row mb-3">
                                <label for="category"  class="col-sm-3 col-form-label">Category</label>
                                <div class="col-sm-9">
                                    <select name="category_id" id="category" class="form-control">
                                        <option value="">-select-</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div  class="row mb-3">
                                <label for="author" class="col-sm-3 col-form-label">Author</label>
                                <div class="col-sm-9">
                                    <select name="author_id" id="author" class="form-control">
                                        <option value="">-select-</option>
                                        @foreach($authors as $author)
                                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="title" class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" id="title" class="form-control" name="title">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="slug"  class="col-sm-3 col-form-label">Slug</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="slug" name="slug">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description"  class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image"  class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="date"  class="col-sm-3 col-form-label">Date</label>
                                <div class="col-sm-9">
                                    <input type="date" name="date" id="date" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="blog_type" class="col-sm-3 col-form-label">Blog Type</label>
                                <div class="col-sm-9">
                                    <select name="blog_type" id="blog_type" class="form-control">
                                        <option value="popular">Popular</option>
                                        <option value="trending">Trending</option>
                                        <option value="latest">Latest</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="status"  class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <input type="radio" id="status" name="status" value="1"> Published &nbsp;
                                    <input type="radio" id="status" name="status" value="0"> Unpublished
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
