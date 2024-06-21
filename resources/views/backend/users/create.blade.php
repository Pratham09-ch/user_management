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
               <center><h4>Add User</h4></center>
                <form action="{{route('admin.store.user')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <label for="name" class="form-label">Enter Full Name: </label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Your Name">
                          
                        </div>
                        <div class="col-md-12 col-12">
                            <label for="email" class="form-label">Enter Email ID: </label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter Your Email ID"> 
                            
                        </div>

                        <div class="col-md-12 col-12">
                            <label for="password" class="form-label">Enter Password: </label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter Your Password"> 
                            
                        </div>
                       
                        <button type="submit" class="login btn btn-primary mt-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection