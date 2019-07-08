@php
    @endphp

<form id="form-penalty-create" action="{{route('penalty_create_post',['waterSourceId'=>$waterSourceId])}}" method="post">
    @csrf
    <div class="row">
        <div class="col-6">
            @input([
                'label' =>' Monto de la multa',
                'name' => 'amount'
            ])
        </div>
        <div class="col-12">
            @textarea([
            'label' =>'Descripción',
            'name' => 'description'
            ])
        </div>
        <div class="col-12 text-center">
            <button class="btn btn-raised btn-primary">
                CREAR
            </button>
        </div>
    </div>
</form>
