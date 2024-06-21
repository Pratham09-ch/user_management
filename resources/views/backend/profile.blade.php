@extends('backend.layouts.app')
@section('title','Admin Profile')
@section('content')
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
<body>
    <div class="container">
        {{-- <a href="{{route('admin.logout')}}" class="btn btn-danger">Logout</a> --}}
        <div class="card">
            <div class="card-body border">
                <h3>Admin Profile Details</h3>
                <p>Name : {{$data->name}}</p>
                <p>Registered At :{{$data->register_at}}</p> 
                <p>Email :{{$data->email}}</p> 
            </div>
        </div>
    </div>
@endsection