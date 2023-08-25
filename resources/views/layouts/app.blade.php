<!DOCTYPE html>

<html>
    <head>
        <title>Laravel Interview Test</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" />
    </head>

    <body>
        <nav>
            <ul>
                <li><a href="{{ route('web.individual_polling_units') }}"  @if(Request::is('/') || Request::is('individual_polling_units')) class="active" @endif>Page 1</a></li>
                <li><a href="{{ route('web.summed_total_results') }}" @if(Request::is('summed_total_results')) class="active" @endif>Page 2</a></li>
                <li><a href="{{ route('web.store_results') }}" @if(Request::is('store_results')) class="active" @endif>Page 3</a></li>
            </ul>
        </nav>
        @yield('content')
    </body>

</html>
