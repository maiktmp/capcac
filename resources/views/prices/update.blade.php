@php
    /* @var $states \App\Models\State []*/
    /* @var $waterSourceTypes \App\Models\WaterSourceType []*/
@endphp
@csrf
<form id="form-update-prices"
      action="{{route('update_prices_post')}}">
    @csrf
    <div class="row m-0">
        <div class="col-12 text-center">
            <h2>Estados</h2>
            <h4>Descuentos</h4>
            <hr>
        </div>
        @foreach($states as $state)
            <div class="col-12">
                @input([
                    'label' => $state->name,
                    'name' => 'state['.$state->id.']',
                    'value' => $state->discount,
                    'errorName' => 'state.'.$state->name,
                    'type' => 'number',
                    'properties'=>[
                            'min' => 0,
                            'step' => "0.01",
                            'required' =>true
                    ]
                ])
            </div>
        @endforeach
        <div class="col-12 text-center">
            <h2>Tipos de toma</h2>
            <h4>Precios</h4>
            <hr>
        </div>
        @foreach($waterSourceTypes as $waterSourceType)
            <div class="col-12">
                @input([
                    'label' => $waterSourceType->name,
                    'name' => 'waterSourceType['.$waterSourceType->id.']',
                    'value' => $waterSourceType->price,
                    'errorName' => 'waterSourceType.'.$waterSourceType->name,
                    'type' => 'number',
                    'properties'=>[
                            'min' => 0,
                            'step' => "0.01",
                            'required' =>true
                    ]
                ])
            </div>
        @endforeach
        <div class="col-12 text-center">
            <button class="btn btn-raised btn-primary">ACTUALIZAR</button>
        </div>
    </div>
</form>
