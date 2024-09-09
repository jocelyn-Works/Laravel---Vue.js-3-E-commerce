@extends('admin.partials.main-layout')

@section('content-header')
<!-- /.content-header -->
@endsection
@section('body')
<!-- Main row -->

<div class="container-fluid mt-5">
    <div class="container-fluid mb-4">
        <a href="{{-- {{ route('') }} --}}" class="btn btn-success">Nouveaux Porte Bagage</a>
    </div>
    @if (isset($message))
    <div class="alert alert-success" role="alert">
        {{ $message }}
    </div>
    @endif
    <h1 class="mb-4">Liste des Porte Bagage Personalisable</h1>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Volume</th>
                <th>Prix</th>
                <th>Image</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($portebagages as $portebagage)
            <tr class="p-3">
                <td>{{ $portebagage->id }}</td>
                <td>{{ $portebagage->name }}</td>
                <td>{{ $portebagage->volume}}</td>
                <td>{{ $portebagage->price}}€</td>
                <td>
                    <img src="{{ asset('storage/images/' . $portebagage->image) }}" alt="{{ $portebagage->name }}" class="img-fluid" width="100">
                </td>

                <td>{{ $portebagage->stock }}</td>

                <td>
                    <!-- <div class="p-2" role="group" aria-label="Actions"> -->
                    <a type="button" data-toggle="modal" data-target="#UpdatePorteBagagePopUp{{$portebagage->id}}" class="btn btn-primary">Update</a>
                    <!-- Modal -->
                    <div class="modal fade" id="UpdatePorteBagagePopUp{{$portebagage->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{$portebagage->id}} Update {{$portebagage->name}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('porteBagagesUpdate', $portebagage->id) }} " method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="message" name="name" class="form-control" id="name" value="name" placeholder="{{$portebagage->name}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="volume" class="form-label">Volume</label>
                                            <input type="message" name="volume" class="form-control" id="volume" placeholder="{{$portebagage->volume}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="price" class="form-label">Prix</label>
                                            <input type="message" name="price" class="form-control" id="price" placeholder="{{$portebagage->price}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Image</label>
                                            <input type="message" name="image" class="form-control" id="image" placeholder="{{$portebagage->image}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="stock" class="form-label">Stock</label>
                                            <input type="message" name="stock" class="form-control" id="stock" placeholder="{{$portebagage->stock}}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action=" {{ route('deletePorteBagage', $portebagage->id) }} " method="POST" style="display:inline;">
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
</div>
<!-- /.row (main row) -->
<h4>Create new Porte bagage</h4>
<form action="{{ route('porteBagagesCreate') }} " method="post">
    @csrf
    <div class="mb-3 col-3">
        <label for="name" class="form-label">Name</label>
        <input type="message" name="name" class="form-control" id="name" value="name" placeholder="{{$portebagage->name}}">
    </div>
    <div class="mb-3 col-3">
        <label for="volume" class="form-label">Volume</label>
        <input type="message" name="volume" class="form-control" id="volume" placeholder="{{$portebagage->volume}}">
    </div>
    <div class="mb-3 col-3">
        <label for="price" class="form-label">Prix</label>
        <input type="message" name="price" class="form-control" id="price" placeholder="{{$portebagage->price}}">
    </div>
    <div class="mb-3 col-3">
        <label for="image" class="form-label">Image</label>
        <input type="message" name="image" class="form-control" id="image" placeholder="{{$portebagage->image}}">
    </div>
    <div class="mb-3 col-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="message" name="stock" class="form-control" id="stock" placeholder="{{$portebagage->stock}}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
