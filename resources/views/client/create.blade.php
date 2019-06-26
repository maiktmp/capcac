@php

    @endphp
@extends('template.main')

@section('content')
    <div class="row">
        <div class="col-12 text-center my-2">
            <h2>Crear cliente</h2>
        </div>
        <div class="col-10 offset-1">
            <div class="card mx-5 mb-5 rounded">
                <div class="card-body p-5">
                    <form action="{{route('client_create_post')}}" method="post">
                        @include('client._form')
                        <div class="col-12 text-center">
                            <button class="btn btn-raised btn-primary">CREAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
