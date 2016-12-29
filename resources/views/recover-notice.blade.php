@extends('template')

@section('main-content')
<div class="row">
    <div class="col-lg-12">
        @include('partials.logo')
        <h1 class="text-center notice-title">Recuperação da senha solicitada</h1>
    </div>
</div>

<div class="row text-center">
    <div class="col-lg-12 notice-text">
        Verifique sua caixa de entrada do email <strong>{{ Session::get('email_recover') }}.</strong><br />
        Para finalizar a recuperação da senha você deve seguir os passos que estão no email recebido.
    </div>
</div>

<div class="row text-center">
    <div class="col-lg-12">
        <a href="{{ route('login') }}" rel="nofollow" class="btn  btn-primary  btn-lg" title="Voltar para login">Voltar para login</a><span class="clearfix"></span>
    </div>
</div>

<div class="row text-center footer-notice">
    <div class="col-lg-12">
        Se ainda não recebeu a mensagem, não esqueça de verificar na sua caixa de spam, ou <a href="{{ route('recover') }}">clique aqui</a> para reenviar o email de recuperação. <br />
        Se você não conseguir recuperar a sua senha, entre em contato com o suporte técnico.
    </div>
</div>
@endsection
