<nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
    <a class="navbar-brand" href="#">
        <img src="{{asset('img/logo.jpg')}}" width="70" height="70" class="d-inline-block align-top rounded" alt="">
    </a>
    @if(Auth::check())
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler"
                aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarToggler">
            {{--<img src="{{asset('img/logob-summa.png')}}" alt="Summa Multimarcas" height="60px">--}}
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('client_index')}}">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('transactions_index')}}">Transacciónes</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"
                       data-toggle="dropdown"
                       href="#"
                       role="button"
                       aria-haspopup="true"
                       aria-expanded="false">Buzón</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item"
                           href="{{route('request_index',['type'=>\App\Models\StatusRequest::NEW])}}">Nueva</a>
                        <a class="dropdown-item"
                           href="{{route('request_index',['type'=>\App\Models\StatusRequest::IN_PROGRESS])}}">En
                            progreso</a>
                        <a class="dropdown-item"
                           href="{{route('request_index',['type'=>\App\Models\StatusRequest::COMPLETED])}}">Completada</a>
                    </div>
                </li>
            </ul>
        </div>

        <a class="ml-auto"
           href="{{route('logout')}}">
            <i class="fas fa-sign-out-alt fa-2x color-withe"></i>
        </a>

    @else
        <a class="ml-auto btn-login"
           href="{{route('login')}}">
            <i class="fas fa-sign-in-alt fa-2x color-withe"></i>
        </a>
    @endif
</nav>
