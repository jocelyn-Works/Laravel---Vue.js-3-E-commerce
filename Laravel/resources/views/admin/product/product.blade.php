@extends('admin.partials.main-layout')

@section('content-header')
    
    <!-- /.content-header -->
@endsection
@section('body')
    <!-- Main row -->
    <div class="container-fluid mt-5">
        <div class="container-fluid mb-4">
            <a href="{{ route('product') }}" class="btn btn-success">Nouveau Produit</a>
        </div>
        <form action="{{ route('searchProduct') }}" method="GET">
            <div class="float-right mb-2">
                <input type="text" class="form-control col-md-8 float-left" name="search" id="search" placeholder="Search by name...">
                <button type="submit" class="btn btn-info">Search</button>
            </div>
        </form>
        @if (isset($message))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
        <h1 class="mb-4">Liste des Produits</h1>
        
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Image</th>
                    <th>Catégorie</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
        @if (isset($results))
        
                @if (count($results) > 0)
                @foreach ($results as $result)
                            <tr class="p-3">
                                <td>{{ $result->id }}</td>
                                <td>{{ $result->name }}</td>
                                <td>{{ $result->description }}</td>
                                <td>{{ $result->price }}€</td>
                                <td>
                                    <img src="{{ URL::asset('uploads/product' . $result->image) }}" alt="{{ $result->image}}" class="img-fluid" width="100">
                                </td>
                                <td>
                                    <small>ID : {{ $result->category->id }}</small><br>
                                    <strong>{{ $result->category->name }}</strong><br>
                                    <small>{{ $result->category->description }}</small>
                                </td>
                                <td>
                                    <div class="p-2" role="group" aria-label="Actions">
                                        <a href=" {{ route('getOneProduct', $result->id) }} "
                                            class="btn btn-warning mb-3">Modifier</a>
                                        <form action="{{ route('deleteProduct', $result->id) }}" method="POST"
                                            style="display:inline;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger ">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                      
                            @endforeach
                        </tbody>
                </table>
                @endif
                @else
        
            <tbody>
                @foreach ($products as $product)
                    <tr class="p-3">
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}€</td>
                        <td>
                            <img src="{{ asset('uploads/product/' . $product->image) }}" alt="{{ $product->name }}"
                                class="img-fluid" width="100">
                        </td>
                        <td>
                            <small>ID : {{ $product->category->id }}</small><br>
                            <strong>{{ $product->category->name }}</strong><br>
                            <small>{{ $product->category->description }}</small>
                        </td>
                        <td>
                            <div class="p-2" role="group" aria-label="Actions">
                                <a href=" {{ route('getOneProduct', $product->id) }} "
                                    class="btn btn-warning mb-3">Modifier</a>
                                <form action="{{ route('deleteProduct', $product->id) }}" method="POST"
                                    style="display:inline;">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger ">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    <!-- /.row (main row) -->
@endsection
