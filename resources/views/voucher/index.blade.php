@php
    /* @var $vouchers  \App\Models\Voucher[]*/
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
@endphp
@push('scripts')
    <script src="{{asset('CDN/sweetalert2.all.js')}}"></script>
    <script src="{{asset('CDN/moment.js')}}"></script>
    <script src="{{asset('CDN/moment.js_locale_es.js')}}"></script>
    <script src="{{asset('commons/date_picker/bootstrap-material-datetimepicker.js')}}"></script>
    <script src="{{asset('commons/modal_tools.js')}}"></script>
    <script src="{{asset('commons/form_tools.js')}}"></script>
    <script src="{{asset('js/voucher/index.js')}}"></script>
@endpush
@push('css')
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
                <div class="col-12 text-right mt-3">
                    <a role="button"
                       href="{{route('transaction_create')}}"
                       class="btn btn-raised btn-primary btn-create">
                        Registar Transacción
                    </a>

                    <a role="button"
                       href="{{route('transactions_filter')}}"
                       class="btn btn-raised btn-primary">
                        Buscar Transacciónes
                    </a>
                </div>
                <div class="col-12">
                    <table class="table table-stripped">
                        <thead>
                        <tr>
                            <td>Mes</td>
                            <td width="5%">Movimientos</td>
                            <td class="text-right">Ingresos</td>
                            <td class="text-right">Egresos</td>
                            <td class="text-right">Total</td>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($months as $month)
                            <tr>
                                <td>{{ $meses[$month['month']-1]}}</td>
                                <td class="text-center">{{$month['number']}}</td>
                                <td class="text-right">
                                    @asMoney(
                                    \App\Models\Voucher::getSumInputs(
                                    $month['month'],
                                    \App\Models\TransactionType::INPUT)
                                    )
                                </td>
                                <td class="text-right">
                                    @asMoney(
                                    \App\Models\Voucher::getSumInputs(
                                    $month['month'],
                                    \App\Models\TransactionType::OUTPUT)
                                    )
                                </td>
                                <td class="text-right">
                                    @asMoney(
                                    \App\Models\Voucher::getSumInputs(
                                    $month['month'])
                                    )
                                </td>
                                <td>
                                    <a
                                        href="{{route('transactions_filter',['month'=>$month['month']])}}">
                                        <i class="fas fa-clipboard-list fa-2x"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="5">Sin multas</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
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
