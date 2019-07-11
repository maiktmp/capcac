@php
    @endphp
@push('scripts')
    <script src="{{asset('commons/modal_tools.js')}}"></script>
    <script src="{{asset('commons/form_tools.js')}}"></script>
    <script src="{{asset('js/landing/home.js')}}"></script>
@endpush
@extends('template.main')

@section('content')
    <div class="container-fluid p-5">
        <div class="card rounded">
            <div class="card-body p-0">
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="background-cover-center"
                                 style="background-image: url('{{ asset('img/carousel/img_1.jpg') }}')">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="background-cover-center "
                                 style="background-image: url('{{asset('img/carousel/img_2.jpg')}}')">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="background-cover-center"
                                 style="background-image: url('{{asset('img/carousel/img_3.jpg')}}')">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="background-cover-center"
                                 style="background-image: url('{{asset('img/carousel/img_4.jpg')}}')">
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="row my-3">
                    <div class="col-8 text-left ">
                        <h2 class="pl-5">Sobre el comite</h2>
                        <hr style="width: 90%">
                        <p class="text-justify p-3">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur earum harum nemo
                            nesciunt non,
                            quibusdam soluta. Ab alias explicabo fuga illo ipsam magnam mollitia, obcaecati odio soluta!
                            Ad
                            eveniet, quae.
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur earum harum nemo
                            nesciunt non,
                            quibusdam soluta. Ab alias explicabo fuga illo ipsam magnam mollitia, obcaecati odio soluta!
                            Ad
                            eveniet, quae.
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur earum harum nemo
                            nesciunt non,
                            quibusdam soluta. Ab alias explicabo fuga illo ipsam magnam mollitia, obcaecati odio soluta!
                            Ad
                            eveniet, quae.
                        </p>
                    </div>
                    <div class="col-4">
                        <img class="img-fluid" src="{{asset('img/google_maps.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade"
         id="modal-login"
         tabindex="-1"
         role="dialog"
         aria-hidden="true">
        <div id="modal-login-size" class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-center d-flex p-3">
                    <h5 class="modal-title align-self-center" id="modal-login-header"></h5>
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
