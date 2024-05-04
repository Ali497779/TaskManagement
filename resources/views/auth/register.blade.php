@extends('layouts.layouts') <!-- Extend the layout file -->

@section('title', 'Register To Task Management') <!-- Define the title -->

@section('content') <!-- Fill in the content section -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    <div class="container">
        <div class="wrapper d-flex align-items-center justify-content-center h-100">
            <div class="card login-form">
                <div class="card-body">
                    <h5 class="card-title text-center">Register To Task Manager</h5>
                    <form action="{{route('register')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="name" name="name" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                        <div class="sign-up mt-4">
                            Already Have an <a href="{{route('login')}}">account? </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page content -->
    <!-- ============================================================== -->

@endsection
