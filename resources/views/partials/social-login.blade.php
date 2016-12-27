<div class="row social-login sign">

    @if (Request::is('registrar'))
        <div class="col-xs-4 col-sm-4 col-md-4">
            <a href="{{url('/oauth/registrar/facebook')}}" title="Registrar com o Facebook" class="icon-button facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span></span></a>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
             <a href="{{url('/oauth/registrar/google')}}" title="Registrar com o Google" class="icon-button google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i><span></span></a>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <a href="{{url('/oauth/registrar/twitter')}}" title="Registrar com o Twitter" class="icon-button twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span></span></a>
        </div>
    @else
        <div class="col-xs-4 col-sm-4 col-md-4">
            <a href="{{url('/oauth/autenticar/facebook')}}" title="Fazer login com o Facebook" class="icon-button facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span></span></a>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
             <a href="{{url('/oauth/autenticar/google')}}" title="Fazer login com o Google" class="icon-button google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i><span></span></a>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <a href="{{url('/oauth/autenticar/twitter')}}" title="Fazer login com o Twitter" class="icon-button twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span></span></a>
        </div>
    @endif

</div>
