@csrf
<div class="row">
    <div class="col-12">
        <h5><b>Datos Personales</b></h5>
        <hr>
    </div>
    <div class="col-6">
        @input([
            'label'=>"Usuario",
            'name' => 'user[username]',
            'value' => old('user.username'),
            'errorName'=>'user.username'
        ])
    </div>
    <div class="col-6">
        @input([
            'label'=>"Contraseña",
            'name' => 'user[password]',
            'value' => old('user[password]'),
            'type'=>'password',
            'errorName'=>'user.password'
        ])
    </div>
    <div class="col-6">
        @input([
            'label'=>"Nombre",
            'name' => 'user[name]',
            'value' => old('user.name'),
            'errorName'=>'user.name'
        ])
    </div>
    <div class="col-6">
        @input([
            'label'=>"Apellidos",
            'name' => 'user[last_name]',
            'value' => old('user.last_name'),
            'errorName'=>'user.last_name'
        ])
    </div>
    <div class="col-6">
        @input([
            'label'=>"Teléfono",
            'name' => 'client[cellphone]',
            'value' => old('client.cellphone'),
            'errorName'=>'client.cellphone'
        ])
    </div>
    <div class="col-6">
        @input([
            'label'=>"Correo",
            'name' => 'client[email]',
            'value' => old('client.email'),
            'errorName'=>'client.email'
        ])
    </div>
    <div class="col-12">
        <h5><b>Domicilio</b></h5>
        <hr>
    </div>
    <div class="col-6">
        @input([
            'label'=>"Calle",
            'name' => 'client[street]',
            'value' => old('client.street'),
            'errorName'=>'client.street'
        ])
    </div>
    <div class="col-6">
        @input([
            'label'=>"Colonia",
            'name' => 'client[colony]',
            'value' => old('client.colony'),
            'errorName'=>'client.colony'
        ])
    </div>
    <div class="col-6">
        @input([
            'label'=>"No. Ext",
            'name' => 'client[ext_num]',
            'value' => old('client.ext_num'),
            'errorName'=>'client.ext_num'
        ])
    </div>
    <div class="col-6">
        @input([
            'label'=>"No. Int",
            'name' => 'client[int_num]',
            'value' => old('client.int_num'),
            'errorName'=>'client.int_num'
        ])
    </div>
    <div class="col-6">
        @input([
            'label'=>"Municipio",
            'name' => 'client[town]',
            'value' => old('client.town'),
            'errorName'=>'client.town'
        ])
    </div>
    <div class="col-6">
        @input([
            'label'=>"C.P.",
            'name' => 'client[zip_address]',
            'value' => old('client.zip_address'),
            'errorName'=>'client.zip_address'
        ])
    </div>
    <div class="col-12">
        <h5><b>Tomas</b></h5>
        <hr>
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
</div>
