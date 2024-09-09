@extends('admin.partials.main-layout')

@section('content-header')
    <!-- /.content-header -->
@endsection
@section('body')
    <!-- Main row -->

    <div class="container-fluid mt-5">
        <div class="container-fluid mb-4">
            <a href=" {{ route('newHandleView') }}" class="btn btn-success">Nouveaux Guidon</a>
        </div>
        @if (isset($message))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
        <h1 class="mb-4">Liste des Guidon Personalisable</h1>
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
                @foreach ($guidons as $guidon)
                    <tr class="p-3">
                        <td>{{ $guidon->id }}</td>
                        <td>{{ $guidon->name }}</td>
                        <td>{{ $guidon->color }}</td>
                        <td>{{ $guidon->material }}</td>
                        <td>{{ $guidon->price }}€</td>
                        <td>
                            <img src="{{ asset('uploads/guidon/' . $guidon->image) }}" alt="{{ $guidon->name }}"
                                class="img-fluid" width="100">
                        </td>
                        <td>{{ $guidon->stock }}</td>

                        <td>
                            <div class="p-2" role="group" aria-label="Actions">
                                <a href="  {{ route('getGuidon', $guidon->id) }} " class="btn btn-warning ">Modifier</a>
                                <form action="{{ route('deleteguidon', $guidon->id) }} " method="POST" style="display:inline;">
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
