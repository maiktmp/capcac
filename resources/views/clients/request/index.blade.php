@php
    /* @var $requests  \App\Models\Request[]*/
@endphp
@push('scripts')
    <script>
        $(document).ready(function () {
            $('tr').click(function () {
                window.location = $(this).data('url');
            })
        });
    </script>
@endpush
@extends('template.main')

@section('content')
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card m-5  rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            @if($error !== null)
                                <div class="alert alert-danger" role="alert">
                                    {{$error}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="col-12 text-right">
                                <a class="btn btn-raised btn-primary btn-upsert mx-3 mt-3"
                                   href="{{route('client_create_request')}}"
                                   role="button">Crear nueva queja</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <h4>Quejas y sugerencias</h4>
                        </div>
                        <div class="col-12">
                            <table class="table table-striped table-selected">
                                <thead>
                                <tr>
                                    <td>Folio</td>
                                    <td>Fecha</td>
                                    <td>Estatus</td>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($requests as $request)
                                    <tr data-url="{{route('request_view',['requestId'=>$request->id])}}">
                                        <td>{{$request->id}}</td>
                                        <td>{{$request->created_at->format('Y-m-d')}}</td>
                                        <td>{{$request->statusRequest->name}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="2">Sin Mensajes</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>

                        </div>
                    </div>
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
