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
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <a href="{{ route('admin.create.user') }}"
                            class="btn btn-primary">Add</a>
                        <div class="table">
                            <table class="table " id="tbl-datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Users</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $srno = 1; @endphp
                                    @if (isset($usersData))
                                        @foreach ($usersData as $usersData)
                                            <tr>
                                                <td>{{ $srno++ }}</td>
                                                <td>{{ $usersData->name }}</td>
                                                <td>
                                                        <a href="{{ route('admin.edit.user' , $usersData->id) }}"
                                                            class="btn btn-primary">edit</a>
                                                            <a href="{{ route('admin.delete.user' , $usersData->id) }}"
                                                                class="btn btn-danger">delete</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    @endif
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
    <script src="{{ asset('public/backend-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('public/backend-assets/vendors/js/tables/datatable/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/backend-assets/vendors/js/tables/datatable/dataTables.buttons.min.js') }}"></script>
@endsection