@php
    /* @var $voucher  \App\Models\Voucher*/
@endphp
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/locale/es.js"></script>
    <script src="{{asset('commons/date_picker/bootstrap-material-datetimepicker.js')}}"></script>
    <script src="{{asset('commons/modal_tools.js')}}"></script>
    <script src="{{asset('commons/form_tools.js')}}"></script>
    <script src="{{asset('js/voucher/filter.js')}}"></script>
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
        <div class="row mt-3">
            <div class="col-12 text-center">
                <h2>Pagos de {{$month}}</h2>
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
