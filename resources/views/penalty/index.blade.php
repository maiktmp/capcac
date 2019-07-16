@php
    /* @var $penalties \App\Models\Penalty[]*/
@endphp

<div class="row">
    <div class="col-12">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>#</td>
                <td>Fecha de multa</td>
                <td>Monto</td>
                <td>Comentarios</td>
                @if(Auth::user()->isAdmin())
                    <td>
                    </td>
                @endif
            </tr>
            </thead>
            <tbody>
            @forelse($penalties as $penalty)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$penalty->date}}</td>
                    <td>{{$penalty->amount}}</td>
                    <td>{{$penalty->description}}</td>
                    @if(Auth::user()->isAdmin())
                        <td width="20%">
                            &nbsp;&nbsp;&nbsp;
                            <a href="{{route('penalty_pay',['penaltyId'=>$penalty->id])}}"
                               class='btn-penalty-payment'
                               data-toggle="tooltip"
                               data-placement="top"
                               title="Realizar pago">
                                <i class="fas fa-money-bill fa-2x"></i>
                            </a>
                        </td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="5">Sin multas</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $penalties->links() }}

    </div>
</div>
