@extends('admin.partials.main-layout')

@section('content-header')
    <!-- /.content-header -->
@endsection
@section('body')
    <!-- Main row -->

    <div class="container-fluid mt-5">
        <div class="container-fluid mb-4">
            <a href="{{route('pedalPost')}}" class="btn btn-success">Nouvelle Pedale</a>
        </div>
        @if (isset($message))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
        <h1 class="mb-4">Liste des Pedale Personalisable</h1>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Couleur</th>
                    <th>Materiaux</th>
                    <th>Prix</th>
                    <th>Image</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedals as $pedal)
                    <tr class="p-3">
                        <td>{{ $pedal->id }}</td>
                        <td>{{ $pedal->name }}</td>
                        <td>{{ $pedal->color }}</td>
                        <td>{{ $pedal->material }}</td>
                        <td>{{ $pedal->price }}€</td>
                        <td>
                            <img src="{{ asset('uploads/pedal/' . $pedal->image) }}" alt="{{ $pedal->name }}"
                                 class="img-fluid" width="100">
                        </td>
                        <td>{{ $pedal->stock }}</td>

                        <td>
                            <div class="p-2" role="group" aria-label="Actions">
                                <a href="{{route('pedalPut', $pedal->id)}} " class="btn btn-warning ">Modifier</a>
                                <form action="{{ route('deletePedal', $pedal->id) }}" method="POST" style="display:inline;">
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
