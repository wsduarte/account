@if(Session::has('message'))
<div class="text-center error-login">
    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
    <span>{{ Session::get('message') }}</span>
</div>
@endif
