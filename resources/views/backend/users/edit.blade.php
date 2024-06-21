@extends('backend.layouts.app')
@section('title','Users')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('admin.logout')}}">LogOut</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{route('admin.users')}}">Users List</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('admin.show_profile')}}">Profile</a>
              </li>
                      
        </ul>
      </div>
    </div>
  </nav>
@section('content')
    <div class="admin-register  mt-5 p-5">
        
        <div class="container bg-white border mt-3 p-2">
            <div class="form-group p-2">
                @if (Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
                @endif
               <center><h4>Edit</h4></center>
                <form action="{{route('admin.update.user')}}" method="post">
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