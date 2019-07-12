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
    <script>
        $(document).ready(function () {
            $('#btn-finish').click(function (e) {
                e.preventDefault();
                var url = $(this).data('url');
                Swal.fire({
                    title: '¿Desea marcar como completada la solicitud?',
                    text: "Las solicitudes completadas ya no podrán recibir mensajes.",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Completar'
                }).then((result) => {
                    console.log(url)
                    if (result.value) {
                        $.get(url, function () {
                            window.location.reload();
                        });
                    }
                })
            });
        });
    </script>
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
                        @if($request->fk_id_status_request !== \App\Models\StatusRequest::COMPLETED)
                            @if(Auth::user()->isAdmin())
                                <div class="col-12 text-right">
                                    <button id="btn-finish"
                                            data-url="{{route('request_completed',['requestId'=>$request->id])}}"
                                            class="btn btn-raised btn-success">Marcar como
                                        resuelta
                                    </button>
                                </div>
                            @endif
                        @endif
                        @forelse($request->followRequests as $followRequest)
                            <div
                                class="{{$followRequest->fk_id_user_transmitter === Auth::id() ? 'offset-1' : ''}} col-11 my-2">
                                <div class="card card-message">
                                    <div
                                        class="card-body {{$followRequest->fk_id_user_transmitter === Auth::id() ? 'bg-message' : ''}}">
                                        {{$followRequest->comment}}
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                    @if($request->fk_id_status_request !== \App\Models\StatusRequest::COMPLETED)
                        <form method="POST" action="{{route('request_view',['requestId'=>$request->id])}}">
                            <div class="row">
                                <div class="col-12">
                                    <hr>
                                    @textarea([
                                    'label' => Auth::user()->isAdmin()?'Respuesta':'Escribe tu comentario',
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
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
