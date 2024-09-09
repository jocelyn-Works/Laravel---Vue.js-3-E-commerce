@extends('admin.partials.main-layout')

@section('content-header')
    
@endsection

@section('body')

    @csrf
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if(isset($message))
                    <div class="alert alert-success" role="alert">
                        {{$message}}
                    </div>
                @endif
                    <form action="{{ route('searchUser') }}" method="GET">
                        <div class="float-right mb-2">
                            <input type="text" class="form-control col-md-8 float-left" name="search" id="search" placeholder="Search Users ...">
                            <button type="submit" class="btn btn-info">Recherche</button>
                        </div>
                    </form>

                    <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Mail</th>
                        <th scope="col">Mot De Passe</th>
                        <th scope="col">Civilité</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Ville</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($results))
                    @foreach($results as $result)
                        <tr>
                            <td>{{$result->id}}</td>
                            <td>{{$result->first_name}}</td>
                            <td>{{$result->last_name}}</td>
                            <td>{{$result->email}}</td>
                            <td>{{$result->password}}</td>
                            <td>{{$result->civility}}</td>
                            <td>{{$result->adress}}</td>
                            <td>{{$result->city}}</td>
                            <td>
                                <a type="button" href="{{ route('userEdit', $result->id) }}" class="btn btn-primary mb-3">Modifier</a>
                                <a type="button" href="{{ route('userDelete', $result->id) }}" class="btn btn-danger mb-3">Supprimer</a>
                            </td>
                        </tr>
                    @endforeach
                    @else
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->password}}</td>
                            <td>{{$user->civility}}</td>
                            <td>{{$user->adress}}</td>
                            <td>{{$user->city}}</td>
                            <td>
                                <a type="button" href="{{ route('userEdit', $user->id) }}" class="btn btn-primary mb-3">Modifier</a>
                                <a type="button" href="{{ route('userDelete', $user->id) }}" class="btn btn-danger mb-3">Supprimer</a>
                            </td>
                        </tr>
                    @endforeach
                    @endif
                    <a type="button" href="{{ route('userPost') }}" class="btn btn-success mb-3">Créer un User</a>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection
