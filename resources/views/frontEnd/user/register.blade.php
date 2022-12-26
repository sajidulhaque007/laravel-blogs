@extends('frontEnd.master')
@section('title')
    Registration
@endsection
@section('content')
    <section id="contact" class="contact mb-5">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h1 class="page-title">User Registration</h1>
                </div>
            </div>

            <div class="form mt-5 col-md-6 m-auto">
                <form action="{{ route('user.register') }}" method="post" class="form-control">
                    @csrf
                    <div class="row mt-3">
                        <div class="form-group col-md-12">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" required>
                            <br>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
                            <br>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone" required>
                            <br>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                            <br>
                        </div>
                    </div>
                    <div class="text-center"><button type="submit" class="btn btn-primary">Register</button></div>
                </form>
            </div>

        </div>
    </section>
@endsection
