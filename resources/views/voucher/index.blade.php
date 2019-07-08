@php
    /* @var $vouchers  \App\Models\Voucher[]*/
@endphp
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/locale/es.js"></script>
    <script src="{{asset('commons/date_picker/bootstrap-material-datetimepicker.js')}}"></script>
    <script src="{{asset('commons/modal_tools.js')}}"></script>
    <script src="{{asset('commons/form_tools.js')}}"></script>
    <script src="{{asset('js/voucher/index.js')}}"></script>
@endpush
@push('css')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet"/>
    <link rel="stylesheet"
          href="{{asset('commons/date_picker/bootstrap-material-datetimepicker.css')}}">
@endpush

@extends('template.main')

@section('content')
    <div class="row">
        <div class="col-12 text-right mt-3">
            <a role="button"
               href="{{route('transaction_create')}}"
               class="btn btn-raised btn-primary btn-create">
                Registar Transacción
            </a>
        </div>
        <div class="col-12">
            {{--<table class="table table-stripped">--}}
            {{--<thead>--}}
            {{--<tr>--}}
            {{--<td>#</td>--}}
            {{--<td>Fecha de pago</td>--}}
            {{--<td>Monto</td>--}}
            {{--<td>Comentarios</td>--}}
            {{--<td>Tipo de movimiento</td>--}}
            {{--</tr>--}}
            {{--</thead>--}}
            {{--<tbody>--}}
            {{--@forelse($penalties as $penalty)--}}
            {{--<tr>--}}
            {{--<td>{{$loop->iteration}}</td>--}}
            {{--<td>{{$penalty->date}}</td>--}}
            {{--<td>{{$penalty->amount}}</td>--}}
            {{--<td>{{$penalty->description}}</td>--}}
            {{--<td>--}}
            {{--&nbsp;&nbsp;&nbsp;--}}
            {{--<a href="{{route('penalty_pay',['penaltyId'=>$penalty->id])}}"--}}
            {{--class='btn-penalty-payment'--}}
            {{--data-toggle="tooltip"--}}
            {{--data-placement="top"--}}
            {{--title="Realizar pago">--}}
            {{--<i class="fas fa-money-bill fa-2x"></i>--}}
            {{--</a>--}}
            {{--</td>--}}
            {{--</tr>--}}
            {{--@empty--}}
            {{--<tr>--}}
            {{--<td class="text-center" colspan="5">Sin multas</td>--}}
            {{--</tr>--}}
            {{--@endforelse--}}
            {{--</tbody>--}}
            {{--</table>--}}

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
