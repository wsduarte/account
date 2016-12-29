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

            {!! Form::open(['route' => 'register.post', 'class' => 'form-signin']) !!}

                {{ Form::text('name', $value = null, $attributes = ['class' => 'form-control', 'placeholder' => 'Informe seu nome completo', 'required' => 'autofocus'] ) }}
                {{ Form::email('email', $value = null, $attributes = ['class' => 'form-control input-register-email', 'placeholder' => 'Informe seu e-mail', 'required' => 'autofocus'] ) }}
                {{ Form::password('password', ['class' => 'form-control input-register-password-up', 'placeholder' => 'Nova Senha', 'pattern'=> '.{6,}', 'required title' => '6 caracteres no mínimo.'] ) }}
                {{ Form::password('confirm', ['class' => 'form-control input-register-confirm','placeholder' => 'Confirme a nova senha', 'pattern'=> '.{6,15}', 'required title' => 'Deve conter entre 6 a 15 caracteres.']) }}

                {{ Form::submit('Confirmar', ['class' => 'btn btn-lg btn-primary btn-block']) }}

            {!! Form::close() !!}

        </div>

        @include('partials.terms')

    </div>
</div>
@endsection
