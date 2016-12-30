@if(Session::has('message'))

    <script>

        setTimeout(function() {
            $('.error-flash').fadeOut('fast');
        }, 6000);

    </script>

    <div class="text-center error-flash">
        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
        <span>{{ Session::get('message') }}</span>
    </div>

    {{ Session::forget('message') }}

@else

    @if($errors->all())

    <script>

        setTimeout(function() {
            $('.error-flash').fadeOut('fast');
        }, 7000);

    </script>

    <div class="text-center error-flash">
        <ul class="alert">
            @foreach ($errors->all() as $error)
                <li>{{ $error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

@endif
