<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('AutoGen::layouts.head')
    </head>
    <body>
        <div class="container-fluid page-container">
            <nav id="w0" class="navbar-inverse navbar-fixed-top navbar">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="/autogen">
                            <img src="{{ asset('public/autogen/img/logo.png') }}" alt="">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse"></div>
                </div>
            </nav>
            <div class="container content-container">
                @yield('body')
            </div>
            <div class="footer-fix"></div>
        </div>
        
        @include('AutoGen::layouts.footer')
        
    </body>
</html>