@extends('frontEnd.master')

@section('title')
  Blog Details
@endsection

@section('content')
  <section class="single-post-content">
    <div class="container">
      <div class="row">
        <div class="col-md-9 post-content" data-aos="fade-up">

          <!-- ======= Single Post Content ======= -->
          <div class="single-post">
            <div class="post-meta"><span class="date">{{ $blog->category_name }}</span> <span
                class="mx-1">&bullet;</span> <span>{{ date("M jS 'y", strtotime($blog->date)) }}</span></div>
            <h1 class="mb-5">{{ $blog->title }}</h1>
            <p><span
                class="firstcharacter">{{ substr($blog->description, 0, 1) }}</span>{{ substr($blog->description, 1, 250) }}
            </p>

            <div class="my-4">
              <img src="{{ asset($blog->image) }}" alt="" class="img-fluid">
            </div>
            <p>{{ substr($blog->description, 250) }}</p>

          </div><!-- End Single Post Content -->

          <!-- ======= Comments ======= -->
          <div class="comments">
            <h5 class="comment-title py-4">{{ count($comments) }} Comments</h5>
            @foreach ($comments as $comment)
              <div class="comment d-flex mb-4">
                <div class="flex-shrink-0">
                  <div class="avatar avatar-sm rounded-circle">
                    <img class="avatar-img" src="{{ asset('frontEnd') }}/assets/img/person-5.jpg" alt=""
                      class="img-fluid">
                  </div>
                </div>
                <div class="flex-grow-1 ms-2 ms-sm-3">
                  <div class="comment-meta d-flex align-items-baseline">
                    <h6 class="me-2">{{ $comment->name }}</h6>
                    <span class="text-muted">{{ date("M jS 'y g:i a", strtotime($comment->created_at)) }}</span>
                    @if (Session::get('userId') == $comment->user_id)
                      <div class="dropdown ml-2" style="position: relative;left: 10px;top: 2px;">
                        <h6 data-bs-toggle="dropdown">
                          <i class="bi bi-three-dots"></i>
                        </h6>
                        <div class="dropdown-menu">
                          <a href="javascript:void(0);" class="dropdown-item"
                            onclick="showEditCommentForm({{ $comment->id }})">edit</a>
                        </div>
                      </div>
                    @endif
                    <div id="editCommentForm{{ $comment->id }}"
                      style="display: none;position: relative;left: -255px;top: 50px;">
                      <form action="#" method="post">
                        @csrf
                        <div class="row">
                          <div class="col-12 mb-3">
                            <textarea class="form-control" name="comment" placeholder="comment" cols="30" rows="10">{{ $comment->comment }}</textarea>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-secondary">update</button>
                      </form>
                    </div>
                  </div>
                  <div class="comment-body">
                    {{ $comment->comment }}
                  </div>
                  <div class="comment-replies bg-light p-3 mt-3 rounded">
                    @foreach ($replies as $reply)
                      {{-- <br> --}}
                      @if ($comment->id == $reply->comment_id)
                        <div class="reply d-flex mt-2">
                          <div class="flex-shrink-0">
                            <div class="avatar avatar-sm rounded-circle">
                              <img class="avatar-img" src="{{ asset('frontEnd') }}/assets/img/person-3.jpg"
                                alt="" class="img-fluid">
                            </div>
                          </div>
                          <div class="flex-grow-1 ms-2 ms-sm-3">
                            <div class="reply-meta d-flex align-items-baseline">
                              <h6 class="mb-0 me-2">{{ $reply->name }}</h6>
                              <span class="text-muted">{{ date("M jS 'y g:i a", strtotime($reply->created_at)) }}</span>
                              @if (Session::get('userId') == $reply->commenter_id)
                                <div class="dropdown ml-2" style="position: relative;left: 10px;top: 2px;">
                                  <h6 data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots"></i>
                                  </h6>
                                  <div class="dropdown-menu">
                                    <a href="" class="dropdown-item">edit</a>
                                  </div>
                                </div>
                              @endif
                            </div>
                            <div class="reply-body">
                              {{ $reply->reply }}
                            </div>
                          </div>
                        </div>
                      @endif
                    @endforeach
                  </div>
                  <div class="col-lg-12 mt-2">
                    <div class="row">
                      <form action="{{ route('new.reply') }}" method="post">
                        @csrf
                        <input type="hidden" name="commenter_id" value="{{ Session::get('userId') }}">
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                        <div class="col-12 mb-3">
                          <textarea class="form-control" name="reply" placeholder="Reply" cols="2" rows="2"></textarea>
                        </div>
                        <div class="col-12">
                          <input type="submit" class="btn btn-primary" value="reply">
                        </div>
                      </form>
                    </div>
                  </div>

                </div>
              </div>
            @endforeach
            <div class="comment d-flex">
            </div>
          </div><!-- End Comments -->
          <!-- ======= Comments Form ======= -->
          @if (Session::get('userId'))
            <div class="row justify-content-center mt-5">
              <form action="{{ route('new.comment') }}" method="post">
                <input type="hidden" name="user_id" value="{{ Session::get('userId') }}">
                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                @csrf
                <div class="col-lg-12">
                  <h5 class="comment-title">Leave a Comment</h5>
                  <div class="row">
                    <div class="col-12 mb-3">
                      <label for="comment-message">Message</label>
                      <textarea class="form-control" name="comment" placeholder="Enter your message" cols="30" rows="10"></textarea>
                    </div>
                    <div class="col-12">
                      <input type="submit" class="btn btn-primary" value="Post comment">
                    </div>
                  </div>
                </div>
              </form>
            </div><!-- End Comments Form -->
          @else
            <h3 class="text-success mt-5">Please <a href="{{ route('user.login') }}"
                class="btn btn-outline-danger">login</a> to comment</h3>
          @endif

        </div>
        <div class="col-md-3">
          <!-- ======= Sidebar ======= -->
          <div class="aside-block">

            <ul class="nav nav-pills custom-tab-nav mb-4">
              <li class="nav-item" role="presentation">
                <button class="nav-link">Related Blog</button>
              </li>

              @foreach ($categoryWiseBlogs as $categoryWiseBlog)
                <div class="post-entry-1 border-bottom">
                  <div class="post-meta"><span class="date">{{ $categoryWiseBlog->category_name }}</span> <span
                      class="mx-1">&bullet;</span>
                    <span>{{ date("M jS 'y", strtotime($categoryWiseBlog->date)) }}</span>
                  </div>
                  <h2 class="mb-2"><a href="#">{{ $categoryWiseBlog->title }}</a></h2>
                  <span class="author mb-3 d-block">{{ $categoryWiseBlog->name }}</span>
                </div>
              @endforeach

            </ul>
          </div>

          <div class="aside-block">
            <h3 class="aside-title">Video</h3>
            <div class="video-post">
              <a href="https://www.youtube.com/watch?v=AiFfDjmd0jU" class="glightbox link-video">
                <span class="bi-play-fill"></span>
                <img src="{{ asset('frontEnd') }}/assets/img/post-landscape-5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div><!-- End Video -->

          <div class="aside-block">
            <h3 class="aside-title">Categories</h3>
            <ul class="aside-links list-unstyled">
              <li><a href="category.html"><i class="bi bi-chevron-right"></i> Business</a></li>
              <li><a href="category.html"><i class="bi bi-chevron-right"></i> Culture</a></li>
              <li><a href="category.html"><i class="bi bi-chevron-right"></i> Sport</a></li>
              <li><a href="category.html"><i class="bi bi-chevron-right"></i> Food</a></li>
              <li><a href="category.html"><i class="bi bi-chevron-right"></i> Politics</a></li>
              <li><a href="category.html"><i class="bi bi-chevron-right"></i> Celebrity</a></li>
              <li><a href="category.html"><i class="bi bi-chevron-right"></i> Startups</a></li>
              <li><a href="category.html"><i class="bi bi-chevron-right"></i> Travel</a></li>
            </ul>
          </div><!-- End Categories -->

          <div class="aside-block">
            <h3 class="aside-title">Tags</h3>
            <ul class="aside-tags list-unstyled">
              <li><a href="category.html">Business</a></li>
              <li><a href="category.html">Culture</a></li>
              <li><a href="category.html">Sport</a></li>
              <li><a href="category.html">Food</a></li>
              <li><a href="category.html">Politics</a></li>
              <li><a href="category.html">Celebrity</a></li>
              <li><a href="category.html">Startups</a></li>
              <li><a href="category.html">Travel</a></li>
            </ul>
          </div><!-- End Tags -->

        </div>
      </div>
    </div>
  </section>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    function showEditCommentForm(commentId) {
      // Hide all edit comment forms
      $('[id^="editCommentForm"]').hide();
      $('.comment-body').addClass("d-none");
      // Show the edit comment form for the selected comment
      $('#editCommentForm' + commentId).show();
    }
  </script>
@endsection
