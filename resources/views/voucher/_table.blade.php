<div class="col-12 px-5">
    <table class="table table-stripped">
        <thead>
        <tr>
            <td>Id</td>
            <td>Fecha</td>
            <td>Monto</td>
            <td>Descripción</td>
            <td>Movimiento</td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        @forelse($results as $voucher)
            <tr>
                <td>{{$voucher->id}}</td>
                <td>{{$voucher->date}}</td>
                <td>@asMoney($voucher->amount)</td>
                <td>{{$voucher->description}}</td>
                <td>{{$voucher->transactionType->name}}</td>
                <td>
                    <a target='_blank'
                       href="{{route('payment_voucher',
                                    ['voucherId'=>$voucher->id])}}">
                        <i>
                            <i class="fas fa-money-check-alt fa-2x"></i>
                        </i>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Sin resultados.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
