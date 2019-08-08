@php
    /* @var $voucher  \App\Models\Voucher*/
@endphp
@push('scripts')
    <script src="{{asset('CDN/sweetalert2.all.js')}}"></script>
    <script src="{{asset('CDN/moment.js')}}"></script>
    <script src="{{asset('CDN/moment.js_locale_es.js')}}"></script>
    <script src="{{asset('commons/date_picker/bootstrap-material-datetimepicker.js')}}"></script>
    <script src="{{asset('commons/modal_tools.js')}}"></script>
    <script src="{{asset('commons/form_tools.js')}}"></script>
    <script src="{{asset('js/voucher/filter.js')}}"></script>
@endpush
@push('css')
    <link href="{{asset('CDN/material_icons.css')}}" rel="stylesheet"/>
    <link href="{{asset('CDN/material_icons.css')}}"
          rel="stylesheet"/>
    <link rel="stylesheet"
          href="{{asset('commons/date_picker/bootstrap-material-datetimepicker.css')}}">
@endpush

@extends('template.main')

@section('content')
    <div class="card m-5  rounded">
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    @input([
                        'id' => 'inp-id',
                        'label' => 'Id',
                        'name' => 'id',
                    ])
                </div>
                <div class="col-8">
                    @input([
                         'id' => 'inp-description',
                        'label' => 'Descripción',
                        'name' => 'description',
                    ])
                </div>
                <div class="col-4">
                    @input([
                        'id' => 'inp-start',
                        'inputClass' =>'inp-date-picker',
                        'label' => 'Desde:',
                        'name' => 'start_date',
                    ])
                </div>
                <div class="col-4">
                    @input([
                        'id' => 'inp-end',
                        'inputClass' =>'inp-date-picker',
                        'label' => 'Hasta:',
                        'name' => 'end_date',
                    ])
                </div>
                <div class="col-4">
                    @select([
                        'id' => 'inp-type',
                        'label' => 'Tipo de movimiento',
                        'name' => 'fk_id_movement_type',
                        'placeHolder' => 'Ambos',
                        'options' => \App\Models\TransactionType::asMap()
                    ])
                </div>
                <div class="col-12 text-center">
                    <a role="button"
                       href="{{route('transactions_filter')}}"
                       class="btn btn-raised btn-primary btn-search">
                        Buscar
                    </a>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <hr>
            </div>
         @include('voucher._table')
        </div>
    </div>
    <div class="modal fade"
         id="modal-transaction"
         tabindex="-1"
         role="dialog"
         aria-hidden="true">
        <div id="modal-transaction-size" class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-center d-flex p-3">
                    <h5 class="modal-title align-self-center" id="modal-transaction-header"></h5>
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
