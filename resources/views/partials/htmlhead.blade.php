<head>
    <meta charset="utf-8">
    <title>
        @if(isset($page))
            {{$page}} - {{ env('VIALOJA') }}
        @else
            {{ env('VIALOJA') }}
        @endif

    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ env('FAVICON')}}">
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
    <link rel='stylesheet prefetch' href="{{ asset('/font-awesome-4.7.0/css/font-awesome.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>

</head>
