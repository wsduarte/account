{{ 'Aguarde!!! Redirecionando você...'}}

@if(Session::has('url_redirect'))
    {!! sprintf("<meta http-equiv=refresh content=3;url=%s>", Session::get('url_redirect')) !!}
@else
    {!! sprintf("<meta http-equiv=refresh content=3;url=%s>", env('URL_DASHBOARD_USER')) !!}
@endif
