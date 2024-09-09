@extends('admin.partials.main-layout')

@section('content-header')
    <!-- /.content-header -->
@endsection
@section('body')
    <!-- Main row -->

    <div class="container-fluid mt-5">
        <div class="container-fluid mb-4">
            <a href="{{-- {{ route('') }} --}}" class="btn btn-success">Nouveaux Cadre</a>
        </div>
        @if (isset($message))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
        <h1 class="mb-4">Liste des Cadre Personalisable</h1>
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



                @foreach ($cadres as $cadre)
                    <tr class="p-3">
                        <td>{{ $cadre->id }}</td>
                        <td>{{ $cadre->name }}</td>
                        <td>{{ $cadre->color }}</td>
                        <td>{{ $cadre->material }}</td>
                        <td>{{ $cadre->price }}€</td>
                        <td>
                            <img src="{{ asset('storage/images/' . $cadre->image) }}" alt="{{ $cadre->name }}"
                                class="img-fluid" width="100">
                        </td>
                        <td>{{ $cadre->stock }}</td>

                        <td>
                            <div class="p-2" role="group" aria-label="Actions">
                                <a href="  {{-- {{ route('getOneProduct', $product->id) }} --}} " class="btn btn-warning ">Modifier</a>
                                <form action=" {{ route('deleteCadre', $cadre->id) }} " method="POST" style="display:inline;">
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
