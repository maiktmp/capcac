@php
    /* @var $waterSources \App\Models\WaterSource []*/
    /* @var $client \App\Models\Client*/
@endphp
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/locale/es.js"></script>
    <script src="{{asset('commons/date_picker/bootstrap-material-datetimepicker.js')}}"></script>
    <script src="{{asset('commons/modal_tools.js')}}"></script>
    <script src="{{asset('commons/form_tools.js')}}"></script>
    <script src="{{asset('js/clients/profile.js')}}"></script>
@endpush
@push('css')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet"/>
    <link rel="stylesheet"
          href="{{asset('commons/date_picker/bootstrap-material-datetimepicker.css')}}">
@endpush

@extends('template.main')

@section('content')
    <div class="card m-5  rounded">
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <div class="row h-100">
                        <div class="col-12 text-center">
                            <h4>Mi perfil</h4>
                            <hr>
                            <table class="text-left h-50">
                                <tbody>
                                <tr>
                                    <td><b>Usuario: </b></td>
                                    <td> {{$user->username}}</td>
                                    <td><b>Nombre: </b></td>
                                    <td> {{$user->full_name}}</td>
                                </tr>
                                <tr class="my-3">
                                    <td><b>Correo: </b></td>
                                    <td> {{$user->client->email}}</td>
                                    <td><b>Teléfono: </b></td>
                                    <td> {{$user->client->cellphone}}</td>
                                </tr>
                                <tr>
                                    <td><b>Dirección: </b></td>
                                    <td colspan="2"> {{$user->client->fullAddress()}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h4>Tomas de agua</h4>
                            <hr>
                        </div>
                        @forelse($waterSources as $waterSource)
                            <div class="col-12 text-center my-2">
                                <div class="card card-water-source">
                                    <div class="card-body">
                                        <div class="row ">
                                            <div class="col-10">
                                                <table>
                                                    <tr>
                                                        <td class="text-left"><b># </b>{{$waterSource->number}}</td>
                                                    </tr>
                                                    {{--<tr>--}}
                                                    {{--<td class="text-left">--}}
                                                    {{--<b>Fecha deregistro </b>{{$waterSource->registration_date}}--}}
                                                    {{--</td>--}}
                                                    {{--</tr>--}}
                                                    <tr>
                                                        <td class="text-left">
                                                            <b>Tipo de toma </b>{{$waterSource->waterSourceType->name}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left">
                                                            <b>Estatus </b>{{$waterSource->state->name}}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div
                                                class="col-2 d-flex flex-column align-items-center justify-content-end">
                                                <a href="{{route('water_sources_payments',['waterSourceId'=>$waterSource->id])}}"
                                                   class='btn-list-penalties btn-index-payments'
                                                   data-toggle="tooltip"
                                                   data-placement="top"
                                                   title="Ver detalles">
                                                    <i class="fas fa-eye text-primary" style="font-size: 1.3em"></i>
                                                </a>

                                                <a href="{{route('penalty_index',['waterSourceId'=>$waterSource->id])}}"
                                                   class='btn-list-penalties'
                                                   data-toggle="tooltip"
                                                   data-placement="top"
                                                   title="Mostrar multas">
                                                    <i class="fas fa-exclamation-triangle" style="font-size: 1.3em"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center">
                                No existen tomas registradas.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade"
         id="modal-water-source"
         tabindex="-1"
         role="dialog"
         aria-hidden="true">
        <div id="modal-water-source-size" class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-center d-flex p-3">
                    <h5 class="modal-title align-self-center" id="modal-water-source-header"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: #ffffff;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
@endsection

