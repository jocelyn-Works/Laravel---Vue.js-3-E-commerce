@extends('admin.partials.main-layout')

@section('content-header')
    <!-- /.content-header -->
@endsection
@section('body')
    <!-- Main row -->

    <div class="container-fluid mt-5">
        <div class="container-fluid mb-4">
            <a href="{{ route('newPropulsionView') }} " class="btn btn-success">Nouveaux moyen de propulsion</a>
        </div>
        @if (isset($message))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
        <h1 class="mb-4">Liste des Moyen de Propulsion Personalisable</h1>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Vitess</th>
                    <th>Autonomie</th>
                    <th>Prix</th>
                    <th>Image</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($propulsions  as $propulsion )
                    <tr class="p-3">
                        <td>{{ $propulsion->id }}</td>
                        <td>{{ $propulsion->name }}</td>
                        <td>{{ $propulsion->max_speed}}</td>
                        <td>{{ $propulsion->autonomie}}</td>
                        <td>{{ $propulsion->price}}€</td>
                        <td>
                            <img src="{{ asset('uploads/propulsion/' . $propulsion->image) }}" alt="{{ $propulsion->name }}"
                                class="img-fluid" width="100">
                        </td>
                        <td>{{ $propulsion->stock }}</td>

                        <td>
                            <div class="p-2" role="group" aria-label="Actions">
                                <a href="   {{ route('getPropulsion', $propulsion->id) }}  " class="btn btn-warning ">Modifier</a>
                                <form action=" {{ route('deletePropulsion', $propulsion->id) }} " method="POST" style="display:inline;">
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
