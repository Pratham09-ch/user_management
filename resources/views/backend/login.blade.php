@extends('backend.layouts.app')
@section('title','Admin Login')
@section('content')
    <div class="admin-login mt-5 p-5">

        <div class="container bg-white border mt-3 p-2">
            <div class="form-body p-4 m-4">
                @if (Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
                @endif
                @if (Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                <center><h4>Admin Login</h4></center>
                <form action="{{route('admin.login.submit')}}" method="post">
                    @csrf
                    <div class="col-md-12 col-12">
                        <label for="email" class="form-label">Enter Email ID: </label>
                        <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Enter Your Email ID"> 
                        <span class="text-danger">
                            @error('email')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-12 col-12">
                        <label for="password" class="form-label">Enter Password :  </label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter Your Password"> 
                        <span class="text-danger">
                            @error('password')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" class="login btn btn-primary mt-2">Login</button>
                    {{-- <a href="{{route('admin.register')}}">click here to register</a> --}}
                </form>
            </div>
        </div>
    </div>
@endsection