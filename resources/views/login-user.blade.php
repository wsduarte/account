@extends('template')

@section('main-content')
<div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4">

        @include('partials.logo')

        <h1 class="text-center login-title">Fazer login para prosseguir para o Painel</h1>
        <div class="account-wall">

            <div class="text-center login-user">
                Entrar com um destes serviços
            </div>

            @include('partials.social-login')
            @include('partials.message')

            <div class=" login-or">
              <hr class="hr-or">
              <span class="span-or">OU</span>
            </div>

            <form class="form-signin" action="{{url('/autenticar')}}" method="post">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                <input type="email" name="email" class="form-control" placeholder="E-mail" required autofocus>
                <input type="password" name="password" class="form-control" placeholder="Senha" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                Fazer Login</button>
                <label class="checkbox pull-left">
                <input type="checkbox" value="remember-me">
                Lembrar senha
                </label>
                <a href="{{url('/recuperar-senha')}}" class="pull-right need-help">Esqueceu sua senha?</a><span class="clearfix"></span>
            </form>
        </div>

        @include('partials.url-account-free')

    </div>
</div>
@endsection
