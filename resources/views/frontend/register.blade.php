@extends('frontend.layouts.app')

@section('content')

    <div class="admin-register  mt-5 p-5">
        
        <div class="container bg-white border mt-3 p-2">
            <div class="form-group p-2">
                @if (Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
                @endif
                @if (Session::has('fail'))
                <div class="alert alert-danger">
                    {{Session::get('fail')}}
                </div>
                @endif
                <center><h4>Register</h4></center>
                <form action="{{route('register.user')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <label for="name" class="form-label">Enter Full Name: </label>
                            <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter Your Name">
                            <span class="text-danger">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-12 col-12">
                            <label for="email" class="form-label">Enter Email ID: </label>
                            <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Enter Your Email ID"> 
                            <span class="text-danger">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-12 col-12">
                            <label for="password" class="form-label">Enter Password :  </label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter Your Password"> 
                            <span class="text-danger">
                                @error('password')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="md-12 col-12">
                            <label for="password_confirmation" class="form-label">Confirm Password :</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Your Password"
                            value="{{ old('password_confirmation')}}">
                            <span class="text-danger">
                                @error('password_confirmation')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <button type="submit" class="login btn btn-primary mt-2">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
