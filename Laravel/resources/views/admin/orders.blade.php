@extends('admin.partials.main-layout')
 
@section('content-header')
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
     <i class="fa fa-bars"></i>
    </button>
 
    <!-- Topbar Search -->
    <form
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{-- {{userconnecter}} --}}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{asset('admin_assets/img/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
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
    @if(isset($message))
    <div class="alert alert-success" role="alert">
        {{$message}}
    </div>
    @endif
    <div class="row">
        <div class="container-fluid">
            <h3>Orders</h3>
        <form action="{{ route('searchOrders') }}" method="GET">
            <div class="float-right mb-2">
                <input type="text" class="form-control col-md-8 float-left" name="search" id="search" placeholder="Search by name...">
                <button type="submit" class="btn btn-info">Search</button>
            </div>
        </form>
        </div>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Status</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Product Name</th>
                    <th scope="col"></th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
            @if (isset($results))
                @if (count($results) > 0)
                @foreach ($results as $result)
                <tr>
                    <th>{{$result->id}}</th>
                    <td>{{$result->status}}</td>
                    <td>{{$result->last_name}}, {{$result->first_name}}</td>
                    <td>{{$result->name}}</td>
                    <td><a type="button" data-toggle="modal" data-target="#UpdateOrderPopUp{{$result->id}}" class="btn btn-primary">Update</a></td>

                    <td><a type="button" href="{{ route('bladeDeleteOrder', $result->id) }}" class="btn btn-danger">Delete</a></td>

                    <!-- Modal -->
                    <div class="modal fade" id="UpdateOrderPopUp{{$result->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Order {{$result->id}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('bladeUpdateOrder', $result->id) }} " method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">status</label>
                                            <input type="status" name="status" class="form-control" id="status" value="status" placeholder="{{$result->status}}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
                @endforeach
                @else
                <td></td>
                    <td>no result found</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    @endif
            @else
                @foreach ($orders as $order)
                <tr>
                    <th>{{$order->id}}</th>
                    <td>{{$order->status}}</td>
                    <td>{{$order->user->last_name}}, {{$order->user->first_name}}</td>
                    <td>@foreach($order->products as $orderProduct)
                            {{$orderProduct->name}}
                        @endforeach</td>
                    <td><a type="button" data-toggle="modal" data-target="#UpdateOrderPopUp{{$order->id}}" class="btn btn-primary">Update</a></td>

                    <td><a type="button" href="{{ route('bladeDeleteOrder', $order->id) }}" class="btn btn-danger">Delete</a></td>

                    <!-- Modal -->
                    <div class="modal fade" id="UpdateOrderPopUp{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Order {{$order->id}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('bladeUpdateOrder', $order->id) }} " method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">status</label>
                                            <input type="status" name="status" class="form-control" id="status" value="status" placeholder="{{$order->status}}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <h4>Create new order</h4>
    <form action="{{ route('bladeCreateOrder') }} " method="post">
        @csrf
        <div class="mb-3 col-3">
            <label for="name" class="form-label">Oder status</label>
            <input type="status" name="status" class="form-control" id="status" value="status">
        </div>
        <div class="mb-3 col-3">
            <label for="userOrder">Users</label>
            <select class="form-control" id="userOrder" name="userOrder">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->last_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 col-3">
            <label for="productOrder">Produits</label>
            <select class="form-control" id="productOrder" name="productsOrder[]">
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 col-3">
            <label for="productOrder">Produits *(facultatif)</label>
            <select class="form-control" id="productOrder" name="productsOrder[]">
                    <option value=""></option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection