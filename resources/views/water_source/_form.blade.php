@php
    /* @var $waterSource \App\Models\WaterSource */
@endphp
@csrf
<div class="col-6">
    @input([
        'label'=>'Número de toma',
        'name'=>'number',
        'value'=>$waterSource->number ?? '',
        'type' =>'text',
        'properties' =>[
            'autocomplete' => 'off'
        ]
    ])
</div>
<div class="col-6">
    @input([
        'id' =>'inp-date-picker',
        'label' => 'Fecha de registro',
        'name'=>'registration_date',
        'value' => $waterSource->registration_date ?? ''
    ])
</div>
<div class="col-6">
    @select([
        'label'=>"Estado",
        'name' => 'fk_id_state',
        'selected' =>  $waterSource->fk_id_state ?? "",
        'options' => \App\Models\State::asMap()
    ])
</div>
<div class="col-6">
    @select([
        'label'=>"Tipo de toma",
        'name' => 'fk_id_water_source_type',
        'selected' => $waterSource->fk_id_water_source_type ?? "",
        'options' => \App\Models\WaterSourceType::asMap()
    ])
</div>
