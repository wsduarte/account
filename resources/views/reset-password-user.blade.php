@extends('template')

@section('main-content')
<div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4">

        @include('partials.logo')

        <h1 class="text-center login-title">Redefinição de senha</h1>
        <div class="account-wall">

            <div class="text-center">Por favor preencha a sua nova senha abaixo.</div>

            <form class="form-new-password">

                <input type="password" class="form-control input-new-password-up" placeholder="Nova Senha" required autofocus>
                <input type="password" class="form-control input-new-password-down" placeholder="Confirme a nova senha" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                Confirme sua senha</button>

            </form>
        </div>

    </div>
</div>
@endsection
