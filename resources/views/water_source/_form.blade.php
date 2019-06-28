@csrf
<div class="col-6">
    @input([
        'label'=>'Número de toma',
        'name'=>'number',
        'value'=>'',
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
    ])
</div>
<div class="col-6">
    @select([
        'label'=>"Estado",
        'name' => 'fk_id_state',
        'value' => old('fk_id_state'),
        'options' => \App\Models\State::asMap()
    ])
</div>
<div class="col-6">
    @select([
        'label'=>"Tipo de toma",
        'name' => 'fk_id_water_source_type',
        'value' => old('fk_id_water_source_type'),
        'options' => \App\Models\WaterSourceType::asMap()
    ])
</div>
