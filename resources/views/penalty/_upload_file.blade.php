@php
    @endphp

<form id="form_transaction_create"
      enctype="multipart/form-data"
      action="{{route('payment_upload_file',['paymentId'=>$paymentId])}}"
      method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            @input([
                'label' =>'Comprobante',
                'name' => 'file_url',
                'type' => 'file',
            ])
        </div>
        <div class="col-12 text-center">
            <button class="btn btn-raised btn-primary">
                SUBIR
            </button>
        </div>
    </div>
</form>
