@extends('template')

@section('main-content')
<div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4">

        @include('partials.logo')

        <h1 class="text-center login-title">Esqueceu sua senha?</h1>
        <div class="account-wall">

            <div class="col-xs-12 col-sm-12 col-md-12">

            Para iniciar a recuperação da sua senha,
            preencha o endereço de email cadastrado e aguarde as instruções
             que serão enviadas por email.

            </div>

            <form class="form-recuperar_senha" method="post">

                <input type="email" class="form-control" placeholder="Informe o email cadastrado" required autofocus>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                Recuperar Senha</button>
                <a href="{{url('/')}}" rel="nofollow" class="pull-right need-voltar" title="Voltar para login">Voltar para login</a><span class="clearfix"></span>

            </form>
        </div>

    </div>
</div>
@endsection
