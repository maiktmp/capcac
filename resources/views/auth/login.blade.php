<form id="form-login"
      class="my-2 "
      method="POST"
      action="{{ route('login.auth') }}">
    @csrf
    <div class="row">
        <div class="col-12">
            @input([
                'label' => 'Usuario',
                'name' => 'username'
            ])
        </div>
        <div class="col-12">
            @input([
                'label' => 'Password',
                'name' => 'password',
                'type' => 'password'
            ])
        </div>
        <div class="col-12 text-center">
            <button class="btn btn-raised btn-primary">
                Ingresar
            </button>
        </div>
    </div>
</form>
