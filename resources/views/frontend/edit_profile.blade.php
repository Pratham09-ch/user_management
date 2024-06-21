@extends('frontend.layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('logout')}}" class="btn btn-danger">Logout</a>
        <div class="card">
            <div class="card-body border">
                <h3>Edit Profile Details</h3>
                <form action="{{route('user.update_profile')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <label for="name" class="form-label">Enter Full Name: </label>
                            <input type="text" id="name" name="name" class="form-control" value="{{$data->name}}" placeholder="Enter Your Name">
                          
                        </div>
                        <div class="col-md-12 col-12">
                            <label for="email" class="form-label">Enter Email ID: </label>
                            <input type="email" id="email" name="email" class="form-control" value="{{$data->email}}" placeholder="Enter Your Email ID"> 
                            
                        </div>
                       
                        <button type="submit" class="login btn btn-primary mt-2">Update</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
@endsection