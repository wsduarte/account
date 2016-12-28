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

            {!! Form::open(['route' => 'recover.post', 'class' => 'form-recuperar_senha']) !!}

                {{ Form::email($name =null, $value = null, $attributes = ['class' => 'form-control', 'name' => 'email'] ) }}
                {{ Form::submit('Recuperar Senha', ['class' => 'btn btn-lg btn-primary btn-block']) }}

                <a href="{{url('/')}}" rel="nofollow" class="pull-right need-voltar" title="Voltar para login">Voltar para login</a><span class="clearfix"></span>

            {!! Form::close() !!}

        </div>

    </div>
</div>
@endsection
