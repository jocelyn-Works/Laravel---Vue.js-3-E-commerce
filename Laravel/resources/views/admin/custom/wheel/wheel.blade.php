@extends('admin.partials.main-layout')

@section('content-header')
    <!-- /.content-header -->
@endsection
@section('body')
    <!-- Main row -->

    <div class="container-fluid mt-5">
        <div class="container-fluid mb-4">
            <a href="{{ route('newWheelView') }} " class="btn btn-success">Nouvelle Roue</a>
        </div>
        @if (isset($message))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
        <h1 class="mb-4">Liste des Roue Personalisable</h1>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Couleur</th>
                    <th>Prix</th>
                    <th>Image</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wheels as $wheel)
                    <tr class="p-3">
                        <td>{{ $wheel->id }}</td>
                        <td>{{ $wheel->name }}</td>
                        <td>{{ $wheel->color }}</td>
                        <td>{{ $wheel->price }}€</td>
                        <td>
                            <img src="{{ asset('uploads/roue/' . $wheel->image) }}" alt="{{ $wheel->name }}"
                                class="img-fluid" width="100">
                        </td>
                        <td>{{ $wheel->stock }}</td>

                        <td>
                            <div class="p-2" role="group" aria-label="Actions">
                                <a href="   {{ route('getProductWheel', $wheel->id) }}  " class="btn btn-warning ">Modifier</a>
                                <form action="{{ route('deleteWheel', $wheel->id) }} " method="POST" style="display:inline;">
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
@endsection
