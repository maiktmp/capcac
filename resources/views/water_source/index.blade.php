@php
    /* @var $waterSources \App\Models\WaterSource []*/
    /* @var $client \App\Models\Client*/
@endphp
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/locale/es.js"></script>
    <script src="{{asset('commons/date_picker/bootstrap-material-datetimepicker.js')}}"></script>
    <script src="{{asset('commons/modal_tools.js')}}"></script>
    <script src="{{asset('commons/form_tools.js')}}"></script>
    <script src="{{asset('js/water_source/index.js')}}"></script>
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
                <div class="col-12 text-center">
                    <h2>Tomas de agua</h2>
                    <h5>{{$client->user->full_name}}</h5>
                </div>
                <div class="col-12 text-right">
                    <a class="btn btn-raised btn-success btn-upsert mx-3 mt-3"
                       href="{{route('water_sources_create',['clientId'=>$client->id])}}"
                       role="button">Agregar toma de agua</a>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fecha de registro</th>
                    <th scope="col">Tipo de toma</th>
                    <th scope="col">Estado</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @forelse($waterSources as $waterSource)
                    <tr>
                        <td>{{$waterSource->number}}</td>
                        <td>{{$waterSource->registration_date}}</td>
                        <td>{{$waterSource->waterSourceType->name}}</td>
                        <td>{{$waterSource->state->name}}</td>
                        <td>
                            <a href="{{route('water_sources_update',['waterSourceId'=>$waterSource->id])}}"
                               class='btn-upsert'
                               data-toggle="tooltip"
                               data-placement="top"
                               title="Actualizar toma">
                                <i class="fas fa-edit fa-2x"></i>
                            </a>
                            &nbsp;&nbsp;&nbsp;
                            <a href="{{route('water_sources_create_payment',['waterSourceId'=>$waterSource->id])}}"
                               class='btn-create-payment'
                               data-toggle="tooltip"
                               data-placement="top"
                               title="Realizar pago">
                                <i class="fas fa-money-bill fa-2x"></i>
                            </a>
                            &nbsp;&nbsp;&nbsp;
                            <a href="{{route('water_sources_payments',['waterSourceId'=>$waterSource->id])}}"
                               class='btn-index-payments'
                               data-toggle="tooltip"
                               data-placement="top"
                               title="Ver pagos">
                                <i class="fas fa-calendar-alt fa-2x"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="5"> No hay tomas ed agua registradas</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
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

