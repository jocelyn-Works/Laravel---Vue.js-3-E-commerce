@extends('admin.partials.main-layout')

@section('content-header')
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{-- {{userconnecter}} --}}</span>
                <img class="img-profile rounded-circle" src="{{asset('admin_assets/img/undraw_profile.svg')}}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Deconnexion
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- /.content-header -->
@endsection
@section('body')
<!-- Main row -->

@if(isset($message))
<div class="alert alert-success" role="alert">
    {{$message}}
</div>
@endif

<div class="row">
    <div>
        <h3>Categories</h3>
        <form action="{{ route('searchCategory') }}" method="GET">
            <div class="float-right mb-2">
                <input type="text" class="form-control col-md-8 float-left" name="search" id="search" placeholder="Search by name...">
                <button type="submit" class="btn btn-info">Search</button>
            </div>
        </form>


        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
                @if (isset($results))
                @if (count($results) > 0)
                @foreach ($results as $result)
                <tr>
                    <th>{{ $result->id }}</th>
                    <td>{{ $result->name }}</td>
                    <td>{{ $result->description }}</td>
                    <td><a type="button" data-toggle="modal" data-target="#UpdateCategoriesPopUp{{$result->id}}" class="btn btn-primary">Update</a></td>

                    <td><a type="button" href="{{ route('bladeDeleteCategory', $result->id) }} " class="btn btn-danger">Delete</a></td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="UpdateCategoriesPopUp{{$result->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update {{$result->name}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('bladeUpdateCategory', $result->id) }} " method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Category name</label>
                                        <input type="name" name="name" class="form-control" id="name" value="name" placeholder="{{$result->name}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Category description</label>
                                        <input type="message" name="description" class="form-control" id="description" placeholder="{{$result->description}}>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <tr>
                    @endforeach
                    @else
                    <td></td>
                    <td>no result found</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @endif
                    @else
                    @foreach ($categories as $category)
                <tr>
                    <th>{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td><a type="button" data-toggle="modal" data-target="#UpdateCategoriesPopUp{{$category->id}}" class="btn btn-primary">Update</a></td>

                    <td><a type="button" href="{{ route('bladeDeleteCategory', $category->id) }} " class="btn btn-danger">Delete</a></td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="UpdateCategoriesPopUp{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update {{$category->name}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('bladeUpdateCategory', $category->id) }} " method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Category name</label>
                                        <input type="name" name="name" class="form-control" id="name" value="name" placeholder="{{$category->name}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Category description</label>
                                        <input type="message" name="description" class="form-control" id="description" placeholder="{{$category->description}}">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

            </tbody>
        </table>
    </div>
</div>
<h4>Create new category</h4>
<form action="{{ route('bladeCreateCategory') }} " method="post">
    @csrf
    <div class="mb-3 col-3">
        <label for="name" class="form-label">Category name</label>
        <input type="name" name="name" class="form-control" id="name" value="name">
    </div>
    <div class="mb-3 col-3">
        <label for="description" class="form-label">Category description</label>
        <input type="message" name="description" class="form-control" id="description">
    </div>
    <div class="col-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection