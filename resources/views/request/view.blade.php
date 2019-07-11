@php
    /* @var $request  \App\Models\Request*/
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
        <div class="col-8 offset-2">
            <div class="card m-5  rounded">
                <div class="card-body">
                    <div class="row">
                        @forelse($request->followRequests as $followRequest)
                            <div
                                class="{{$followRequest->fk_id_user_transmitter === Auth::id() ? 'offset-1 text-right' : ''}} col-11 my-2">
                                <div class="card card-message">
                                    <div class="card-body">
                                        {{$followRequest->comment}}
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                    <form method="POST" action="{{route('request_view',['requestId'=>$request->id])}}">
                        <div class="row">
                            <div class="col-12">
                                <hr>
                                @textarea([
                                'label' => 'Respuesta',
                                'name' => 'comment',
                                'rows' => 5
                                ])
                            </div>
                            <div class="col-12 text-right">
                                @csrf
                                <button class="btn btn-raised btn-primary">ENVIAR</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
