@extends('template')

@section('main-content')
<div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4">

        @include('partials.logo')

        <h1 class="text-center login-title">Redefinição de senha</h1>
        <div class="account-wall">

            <div class="text-center">Por favor preencha a sua nova senha abaixo.</div>

            {!! Form::open(['route' => 'reset.password.post', 'class' => 'form-new-password']) !!}

                {{ Form::hidden('tokenSHA1', $tokenSHA1 ) }}
                {{ Form::password('password', ['class' => 'form-control input-new-password-up', 'placeholder' => 'Nova Senha', 'pattern'=> '.{6,}', 'required title' => '6 caracteres no mínimo.'] ) }}
                {{ Form::password('confirm', ['class' => 'form-control input-new-password-down','placeholder' => 'Confirme a nova senha', 'pattern'=> '.{6,15}', 'required title' => 'Deve conter entre 6 a 15 caracteres.']) }}
                {{ Form::submit('Confirme sua senha', ['class' => 'btn btn-lg btn-primary btn-block']) }}

            {!! Form::close() !!}

        </div>

    </div>
</div>
@endsection
