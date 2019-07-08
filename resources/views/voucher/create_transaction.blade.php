@php
    @endphp

<form id="form_transaction_create"
      enctype="multipart/form-data"
      action="{{route('transaction_create_post')}}"
      method="post">
    @csrf
    <div class="row">
        <div class="col-6">
            @select([
                'label' =>'Tipo de transacción',
                'name' => 'fk_id_transaction_type',
                'options' => \App\Models\TransactionType::asMap()
            ])
        </div>
        <div class="col-6">
            @input([
                'label' =>'Monto',
                'name' => 'amount',
                'type' => 'number',
            ])
        </div>
        <div class="col-12">
            @input([
                'label' =>'Comprobante',
                'name' => 'file_url',
                'type' => 'file',
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
