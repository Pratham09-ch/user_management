@extends('frontend.layouts.app')
@section('title','Profile')
@section('content')
<body>
    <div class="container">
        @if (Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif
        <a href="{{route('logout')}}" class="btn btn-danger">Logout</a>
        <a href="{{route('user.edit_profile',$data->id)}}" class="btn btn-primary">Edit</a>
        <div class="card">
            <div class="card-body border">
                <h3>Profile Details</h3>
                <p>Name : {{$data->name}}</p>
                <p>Registered At :{{$data->register_at}}</p> 
                <p>Email :{{$data->email}}</p> 
            </div>
        </div>
    </div>

</body>
</html>