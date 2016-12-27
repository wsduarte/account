@extends('template')

@section('main-content')
<div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4">

        @include('partials.logo')

        <h1 class="text-center login-title">Criar conta Administrativa</h1>
        <div class="account-wall">

            <div class="text-center register-user">
                Cadastre-se com um destes serviços
            </div>

            @include('partials.social-login')

            <div class=" login-or">
              <hr class="hr-or">
              <span class="span-or">OU</span>
            </div>

            <form class="form-signin">

                <input type="text" class="form-control" placeholder="Informe seu nome completo" required autofocus>
                <input type="email" class="form-control" placeholder="Informe seu e-mail" required>
                <input type="password" class="form-control" placeholder="Informe sua senha" required>
                <input type="password" class="form-control" placeholder="Repita a senha" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                Confirmar</button>


            </form>
        </div>

        @include('partials.terms')

    </div>
</div>
@endsection
