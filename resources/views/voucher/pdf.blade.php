@php
    /* @var $voucher \App\Models\Voucher*/
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
<style>
    .table-voucher tr {
        border: 1px solid black;
        padding: 1em;
        text-align: center;
    }

    .table-voucher tr td {
        border: 1px solid black;
        padding: 1em;
    }
</style>
<body>
<div style="
            height: 40vh;
            width: 100vw;
            display: flex;
            align-content: center;
            align-items: center;
            margin-top: 10vh;
            flex-direction: column;
            ">
    <div style="
                width: 95%;
                background-color: white;
                padding: 0 1em;
                border: 1px solid black;
        ">
        <div style=" width:100%;margin-top: 2em">
            <div style="width: 100%;text-align: center">
                <h2>Recibo de pago</h2>
            </div>
            <div style="height: 40%;width: 100%">
                <table style="width: 100%">
                    <tbody>
                    <tr>
                        <td><b>Comite de Agua Potable de Calixtlahuaca A.C</b></td>
                        <td><b><span style="color:red;">FOLIO:  {{$voucher->id}}</span></b></td>
                    </tr>
                    <tr>
                        <td><b>Teléfono:</b> (521)7223265874</td>
                        <td><b>Fecha:</b> {{\Carbon\Carbon::now()->format('Y/m/d')}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div style=" margin:2em 0 ;width: 100%">
            <table class="table-voucher" style="height:70%; width: 100%; border: 1px solid black; margin-top: 0.5em">
                <thead>
                <tr>
                    <th>Fecha de pago</th>
                    <th>Monto de pago</th>
                    <th>Tipo de movimiento</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$voucher->date}}</td>
                    <td>@asMoney($voucher->amount)</td>
                    <td>{{$voucher->transactionType->name}}</td>
                </tr>
                <tr>
                    <th class="text-center" colspan="3">Descripción de pago</th>
                </tr>
                <tr class="text-justify">
                    <td colspan="3">
                        {{$voucher->description}}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    window.print();
    window.close();
</script>
@include('template.global_js')
</body>
</html>
