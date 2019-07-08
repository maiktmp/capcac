<nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler"
            aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarToggler">
        {{--<img src="{{asset('img/logob-summa.png')}}" alt="Summa Multimarcas" height="60px">--}}
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('client_index')}}">Clientes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Bienes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('transactions_index')}}">Transacciónes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Buzón</a>
            </li>
        </ul>
    </div>
</nav>
