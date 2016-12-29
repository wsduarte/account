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


            {!! Form::open(['route' => 'authenticate.post', 'class' => 'form-signin']) !!}

                {{ Form::email('email', $value = null, $attributes = ['class' => 'form-control', 'placeholder' => 'Informe seu e-mail', 'required' => 'autofocus'] ) }}
                {{ Form::password('password', ['class' => 'form-control input-new-password-up', 'placeholder' => 'Informe sua senha', 'pattern'=> '.{6,}', 'required title' => '6 caracteres no mínimo.'] ) }}
                {{ Form::submit('Fazer Login', ['class' => 'btn btn-lg btn-primary btn-block']) }}
                
                <a href="{{ route('recover') }}" class="pull-right need-help">Esqueceu sua senha?</a><span class="clearfix"></span>

            {!! Form::close() !!}

        </div>

        @include('partials.url-account-free')

    </div>
</div>
@endsection
