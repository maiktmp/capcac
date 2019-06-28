@php
    /* @var $payments \App\Models\Payment[]*/
@endphp

<div class="row">
    <div class="col-12">
        <table class="table w-100 table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Cantidad</th>
                <th>Desde</th>
                <th>Hasta</th>
            </tr>
            </thead>
            <tbody>
            @forelse($payments as $payment)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>@asMoney($payment->price)</td>
                    <td>{{$payment->start_date}}</td>
                    <td>{{$payment->end_date}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No hay pagos registrados.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
