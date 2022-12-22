<!-- ======= Header ======= -->

<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="{{ route('home') }}" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="{{ asset('frontEnd') }}/assets/img/logo.png" alt=""> -->
            <h1>ZenBlog</h1>
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{ route('home') }}">Blog</a></li>
                <li class="dropdown"><a href="{{ route('allBlog.category') }}"><span>Categories</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                       @foreach ($categories as $category)
                        <li><a href="{{ route('category.details',$category->id) }}">{{ $category->category_name }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li><a href="{{ route('about') }}">Abouts</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </nav>

        <div class="position-relative">
            @if(Session::get('userId'))
            <a class="mx-2"><span class="btn btn-dark">{{ Session::get('userName') }}</span></a>
            <a href="{{ route('user.logout') }}" class="mx-2"><span class="btn btn-dark">Logout</span></a>
            @else
            <a href="{{ route('register') }}" class="mx-2"><span class="btn btn-dark">Registration</span></a>
            <a href="{{ route('user.login') }}" class="mx-2"><span class="btn btn-dark">Login</span></a>
            @endif

            <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
            <i class="bi bi-list mobile-nav-toggle"></i>

            <!-- ======= Search Form ======= -->
            <div class="search-form-wrap js-search-form-wrap">
                <form action="search-result.html" class="search-form">
                    <span class="icon bi-search"></span>
                    <input type="text" placeholder="Search" class="form-control">
                    <button class="btn js-search-close"><span class="bi-x"></span></button>
                </form>
            </div><!-- End Search Form -->

        </div>

    </div>

</header><!-- End Header -->


