@php
    /* @var $payment \App\Models\Payment*/
@endphp
    <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="#"/>
    <title>@yield('title', 'Comite de Agua')</title>
    @include('template.global_css')
</head>
<body>
<div style="height: 20vh;width: 100vw; margin-top: 2em">
    <div style="width: 100%;text-align: center">
        <h2>Recibo de pago</h2>
    </div>
    <div style="height: 40vh;width: 100vw;padding:  0 25vh">
        <table style="width: 100%">
            <tbody>
            <tr>
                <td><b>Comite de Agua Potable de Calixtlahuaca A.C</b></td>
                <td><b>Fecha:</b> {{\Carbon\Carbon::now()->format('Y/m/d')}}</td>
            </tr>
            <tr>
                <td><b>Teléfono:</b> (521)7223265874</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<div style="height: 40vh;width: 100vw;padding:  0 25vh">
    <table style="height:70%; width: 100%; border: 1px solid black; margin-top: 0.5em">
        <thead>
        <tr>
            <th>Fecha de pago</th>
            <th>Monto de pago</th>
            <th>Tipo de movimiento</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$payment->voucher->date}}</td>
            <td>@asMoney($payment->voucher->amount)</td>
            <td>{{$payment->voucher->transactionType->name}}</td>
        </tr>
        <tr>
            <th class="text-center" colspan="3">Descripción de pago</th>
        </tr>
        <tr class="text-justify">
            <td colspan="3">
                {{$payment->voucher->description}}
            </td>
        </tr>
        </tbody>
    </table>
</div>

@include('template.global_js')
</body>
</html>
