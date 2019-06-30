@php
    /* @var $users \App\Models\User []*/
@endphp

@extends('template.main')

@push('scripts')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        })
    </script>
@endpush

@section('content')
    <div class="card m-5  rounded">
        <div class="card-body">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>Clientes</h2>
                </div>
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
                    <td></td>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td class="text-center">
                            <a href="{{route('water_sources_index',['clientId'=>$user->client->id])}}"
                               data-toggle="tooltip"
                               data-placement="top"
                               title="Ver tomas de agua">
                                <i class="fas fa-tint fa-2x"></i>
                            </a>
                            &nbsp;&nbsp;&nbsp;
                            <a href="{{route('client_update',['clientId'=>$user->client->id])}}"
                               data-toggle="tooltip"
                               data-placement="top"
                               title="Editar usuario">
                                <i class="fas fa-user-edit fa-2x"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="5"> No hay clientes registrados</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
