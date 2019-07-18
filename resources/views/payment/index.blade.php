@php
    /* @var $payments \App\Models\Payment[]*/
    /* @var $penalties \App\Models\Penalty[]*/
@endphp

<div class="row">
    <div class="col-12">
        <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active"
                   id="home-tab"
                   data-toggle="tab"
                   href="#payments"
                   role="tab"
                   aria-controls="payments"
                   aria-selected="true">Pagos en la toma</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                   id="profile-tab"
                   data-toggle="tab"
                   href="#penalties-payment"
                   role="tab"
                   aria-controls="penalties-payment"
                   aria-selected="false">Multas Pagadas</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="payments" role="tabpanel" aria-labelledby="payments-tab">
                <table class="table w-100 table-striped">
                    <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Cantidad</th>
                        <th>Desde</th>
                        <th>Hasta</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($payments as $payment)
                        <tr>
                            <td>{{$payment->id}}</td>
                            <td>@asMoney($payment->price)</td>
                            <td>{{$payment->start_date}}</td>
                            <td>{{$payment->end_date}}</td>
                            @auth
                                <td width="25%">
                                    <a target='_blank'
                                       href="{{route('payment_voucher',
                                    ['voucherId'=>$payment->voucher->id])}}">
                                        <i>
                                            <i class="fas fa-money-check-alt fa-2x"></i>
                                        </i>
                                    </a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <a class="btn-upload-file-voucher"
                                       href="{{route('payment_upload_file',
                                              ['voucherId'=>$payment->voucher->id])}}">
                                        <i>
                                            <i class="fas fa-file-upload fa-2x"></i>
                                        </i>
                                    </a>
                                    @if($payment->voucher->absolute_file_url !== null)
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <a
                                            target="_blank"
                                            href="{{$payment->voucher->absolute_file_url}}">
                                            <i>
                                                <i class="fas fa-file-download fa-2x"></i>
                                            </i>
                                        </a>
                                    @endif
                                </td>
                            @endauth
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No hay pagos registrados.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                {{ $payments->links() }}
            </div>
            <div class="tab-pane fade" id="penalties-payment" role="tabpanel" aria-labelledby="penalties-payment-tab">
                <table class="table w-100 table-striped">
                    <thead>
                    <tr>
                        <th>Fecha de multa</th>
                        <th>Fecha de pago</th>
                        <th>Monto</th>
                        <th>Descripción</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($penalties as $penalty)
                        <tr>
                            <td>{{$penalty->date}}</td>
                            <td>{{$penalty->deleted_at->format('Y-m-d')}}</td>
                            <td>@asMoney($penalty->amount)</td>
                            <td>{{$penalty->description}}</td>
                            @auth
                                <td width="25%">
                                    <a target='_blank'
                                       href="{{route('payment_voucher',
                                       ['voucherId'=>$penalty->voucher->id])}}">
                                        <i>
                                            <i class="fas fa-money-check-alt fa-2x"></i>
                                        </i>
                                    </a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <a class="btn-upload-file-voucher"
                                       href="{{route('payment_upload_file',
                                              ['voucherId'=>$penalty->voucher->id])}}">
                                        <i>
                                            <i class="fas fa-file-upload fa-2x"></i>
                                        </i>
                                    </a>
                                    @if($penalty->voucher->absolute_file_url !== null)
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <a
                                            target="_blank"
                                            href="{{$penalty->voucher->absolute_file_url}}">
                                            <i>
                                                <i class="fas fa-file-download fa-2x"></i>
                                            </i>
                                        </a>
                                    @endif
                                </td>
                            @endauth
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No hay pagos de multas registrados.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                {{ $penalties->links() }}
            </div>
        </div>
    </div>
</div>
