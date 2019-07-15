@php
    /* @var $waterSource \App\Models\WaterSource*/
    $user = $waterSource->client->user;
@endphp
<div class="row">
    <div class="col-12">
        <table class="table w-100">
            <tbody>
            <tr>
                <td><b>#Toma:</b> {{$waterSource->number}}</td>
                <td><b>Tipo de toma:</b> {{$waterSource->waterSourceType->name}}</td>
            </tr>
            <tr>
                <td><b>Titular:</b> {{$user->full_name}}</td>
                <td><b>Correo:</b> {{$user->client->email}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-12">
        <div class="alert alert-danger errors-message" style="display: none">

        </div>
    </div>
    <div class="col-12">
        <form id="form-create-payment"
              action="{{route('water_sources_create_payment_post',['waterSourceId'=>$waterSource->id])}}">
            @csrf
            <div class="row">
                <div class="col-4">
                    @input([
                        'id' => 'inp-start-date',
                        'label' => 'Desde',
                        'inputClass' =>'inp-date-picker',
                        'name'=>'start_date',
                        'value' => $lastPayment->end_date ?? ""
                    ])
                </div>
                <div class="col-4">
                    @input([
                        'id' => 'inp-end-date',
                        'label' => 'Hasta',
                        'inputClass' =>'inp-date-picker',
                        'name'=>'end_date',
                    ])
                </div>
                <div class="col-4 justify-content-center d-flex">
                    <a role="button"
                       href="{{route('water_sources_compute_payment',[
                            'waterSourceId'=> $waterSource->id,
                            'start_date'=>'FAKE_START_DATE',
                            'end_date'=>'FAKE_END_DATE'
                       ])}}"
                       class="btn btn-raised btn-primary btn-compute-payment align-self-center">Calcular pago</a>
                </div>
                <div class="col-12 ">
                    <h2 id="lbl-total-payment">Total: $0.0</h2>
                    <h5 id="lbl-total-months"></h5>
                </div>
                <div class="col-12">
                    @textarea([
                    'label' => 'Descripción',
                    'name' => 'description',
                    'rows' => 5
                    ])
                </div>
            </div>
            <div class="col-12 text-center">
                <button
                    data-url="{{route('water_sources_compute_payment',[
                            'waterSourceId'=> $waterSource->id,
                            'start_date'=>'FAKE_START_DATE',
                            'end_date'=>'FAKE_END_DATE'
                       ])}}"
                    class="btn btn-raised btn-success btn-pay align-self-center"
                    disabled>Pagar
                </button>
            </div>
        </form>
    </div>
</div>
