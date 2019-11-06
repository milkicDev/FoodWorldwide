<html>
    <head>
        @include('includes.meta')
    </head>

    <body>
        <header>
            @include('includes.header')
        </header>

        <div class="container">
            <div id="main" class="row justify-content-center my-3">
                @yield('content')
            </div>
        </div>
    </body>
</html>
