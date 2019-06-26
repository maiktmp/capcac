@php
    /* @var $users \App\Models\User []*/
@endphp

@extends('template.main')

@section('content')
    <div class="card m-5  rounded">
        <div class="card-body">
            <div class="row">
                <div class="col-12 text-right">
                    <a class="btn btn-raised btn-success mx-3 mt-3" href="{{route('client_create')}}" role="button">Agregar
                        Usuario</a>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->last_name}}</td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="4"> No hay clientes registrados</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
